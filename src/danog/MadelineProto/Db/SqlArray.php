<?php

declare(strict_types=1);

namespace danog\MadelineProto\Db;

use Amp\Sql\CommandResult;
use Amp\Sql\Pool;
use Amp\Sql\Result;
use Amp\Sql\ResultSet;
use PDO;
use Throwable;
use Webmozart\Assert\Assert;

use function serialize;

/**
 * Generic SQL database backend.
 */
abstract class SqlArray extends DriverArray
{
    protected Pool $db;
    //Pdo driver used for value quoting, to prevent sql injections.
    protected PDO $pdo;

    protected const SQL_GET = 0;
    protected const SQL_SET = 1;
    protected const SQL_UNSET = 2;
    protected const SQL_COUNT = 3;
    protected const SQL_ITERATE = 4;
    protected const SQL_CLEAR = 5;

    /**
     * @var array<self::SQL_*, string>
     */
    private array $queries = [];

    /**
     * Prepare statements.
     *
     * @param SqlArray::SQL_* $type
     */
    abstract protected function getSqlQuery(int $type): string;

    public function setTable(string $table): DriverArray
    {
        $this->table = $table;

        $this->queries = [
            self::SQL_GET => $this->getSqlQuery(self::SQL_GET),
            self::SQL_SET => $this->getSqlQuery(self::SQL_SET),
            self::SQL_UNSET => $this->getSqlQuery(self::SQL_UNSET),
            self::SQL_COUNT => $this->getSqlQuery(self::SQL_COUNT),
            self::SQL_ITERATE => $this->getSqlQuery(self::SQL_ITERATE),
            self::SQL_CLEAR => $this->getSqlQuery(self::SQL_CLEAR),
        ];

        return $this;
    }
    /**
     * Deserialize retrieved value.
     */
    protected function getValue(string $value): mixed
    {
        return \unserialize($value);
    }

    /**
     * Serialize retrieved value.
     */
    protected function setValue(mixed $value): string
    {
        return \serialize($value);
    }

    /**
     * @return \Traversable<array<string, mixed>>
     */
    public function getIterator(): \Traversable
    {
        return $this->execute($this->queries[self::SQL_ITERATE]);
    }

    public function getArrayCopy(): array
    {
        return \iterator_to_array($this->getIterator());
    }

    public function offsetGet(mixed $key): mixed
    {
        $key = (string) $key;
        if ($this->hasCache($key)) {
            return $this->getCache($key);
        }

        $row = $this->execute($this->queries[self::SQL_GET], ['index' => $key]);
        if (!$row->advance()) {
            return null;
        }
        $row = $row->getCurrent();

        if ($value = $this->getValue($row['value'])) {
            $this->setCache($key, $value);
        }

        return $value;
    }

    public function set(string|int $key, mixed $value): void
    {
        $key = (string) $key;
        if ($this->hasCache($key) && $this->getCache($key) === $value) {
            return;
        }

        $this->setCache($key, $value);

        $result = $this->execute(
            $this->queries[self::SQL_SET],
            [
                'index' => $key,
                'value' => $this->setValue($value),
            ],
        );
        Assert::greaterThanEq($result->getAffectedRowCount(), 1);
        $this->setCache($key, $value);
    }

    /**
     * Unset value for an offset.
     *
     * @link https://php.net/manual/en/arrayiterator.offsetunset.php
     * @throws Throwable
     */
    public function unset(string|int $key): void
    {
        $key = (string) $key;
        $this->unsetCache($key);

        $this->execute(
            $this->queries[self::SQL_UNSET],
            ['index' => $key],
        );
    }

    /**
     * Count elements.
     *
     * @link https://php.net/manual/en/arrayiterator.count.php
     * @return int The number of elements or public properties in the associated
     * array or object, respectively.
     * @throws Throwable
     */
    public function count(): int
    {
        /** @var ResultSet */
        $row = $this->execute($this->queries[self::SQL_COUNT]);
        Assert::true($row->advance());
        return $row->getCurrent()['count'];
    }

    /**
     * Clear all elements.
     */
    public function clear(): void
    {
        $this->clearCache();
        $this->execute($this->queries[self::SQL_CLEAR]);
    }

    /**
     * Perform async request to db.
     *
     * @psalm-param self::STATEMENT_* $stmt
     * @return CommandResult|ResultSet
     * @throws Throwable
     */
    protected function execute(string $sql, array $params = []): Result
    {
        if (isset($params['index'])
            && !\mb_check_encoding($params['index'], 'UTF-8')
        ) {
            $params['index'] = \mb_convert_encoding($params['index'], 'UTF-8');
        }

        foreach ($params as $key => $value) {
            $value = $this->pdo->quote($value);
            $sql = \str_replace(":$key", $value, $sql);
        }

        return $this->db->query($sql);
    }
}
