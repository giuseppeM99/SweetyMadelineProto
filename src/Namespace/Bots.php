<?php declare(strict_types=1);
/**
 * This file is automatic generated by build_docs.php file
 * and is used only for autocomplete in multiple IDE
 * don't modify manually.
 */

namespace danog\MadelineProto\Namespace;

interface Bots
{
    /**
     * Sends a custom request; for bots only.
     *
     * @param mixed $params Any JSON-encodable data
     *
     *
     * @param string $custom_method The method name
     *
     *
     * @return mixed Any JSON-encodable data
     */
    public function sendCustomRequest(mixed $params, string $custom_method = ''): mixed;

    /**
     * Answers a custom query; for bots only.
     *
     * @param mixed $data Any JSON-encodable data
     *
     *
     * @param int $query_id Identifier of a custom query
     *
     *
     */
    public function answerWebhookJSONQuery(mixed $data, int $query_id = 0): bool;

    /**
     * Set bot command list.
     *
     * @param array{_: 'botCommandScopeDefault'}|array{_: 'botCommandScopeUsers'}|array{_: 'botCommandScopeChats'}|array{_: 'botCommandScopeChatAdmins'}|array{_: 'botCommandScopePeer', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}}|array{_: 'botCommandScopePeerAdmins', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}}|array{_: 'botCommandScopePeerUser', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, user_id: array{_: 'inputUserEmpty'}|array{_: 'inputUserSelf'}|array{_: 'inputUser', user_id?: int, access_hash?: int}|array{_: 'inputUserFromMessage', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, msg_id?: int, user_id?: int}} $scope Command scope @see https://docs.madelineproto.xyz/API_docs/types/BotCommandScope.html
     *
     *
     * @param string $lang_code Language code
     *
     *
     * @param list<array{_: 'botCommand', command?: string, description?: string}>|array<never, never> $commands Array of Bot commands @see https://docs.madelineproto.xyz/API_docs/types/BotCommand.html
     *
     *
     */
    public function setBotCommands(array $scope, string $lang_code = '', array $commands = []): bool;

    /**
     * Clear bot commands for the specified bot scope and language code.
     *
     * @param array{_: 'botCommandScopeDefault'}|array{_: 'botCommandScopeUsers'}|array{_: 'botCommandScopeChats'}|array{_: 'botCommandScopeChatAdmins'}|array{_: 'botCommandScopePeer', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}}|array{_: 'botCommandScopePeerAdmins', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}}|array{_: 'botCommandScopePeerUser', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, user_id: array{_: 'inputUserEmpty'}|array{_: 'inputUserSelf'}|array{_: 'inputUser', user_id?: int, access_hash?: int}|array{_: 'inputUserFromMessage', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, msg_id?: int, user_id?: int}} $scope Command scope @see https://docs.madelineproto.xyz/API_docs/types/BotCommandScope.html
     *
     *
     * @param string $lang_code Language code
     *
     *
     */
    public function resetBotCommands(array $scope, string $lang_code = ''): bool;

    /**
     * Obtain a list of bot commands for the specified bot scope and language code.
     *
     * @param array{_: 'botCommandScopeDefault'}|array{_: 'botCommandScopeUsers'}|array{_: 'botCommandScopeChats'}|array{_: 'botCommandScopeChatAdmins'}|array{_: 'botCommandScopePeer', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}}|array{_: 'botCommandScopePeerAdmins', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}}|array{_: 'botCommandScopePeerUser', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, user_id: array{_: 'inputUserEmpty'}|array{_: 'inputUserSelf'}|array{_: 'inputUser', user_id?: int, access_hash?: int}|array{_: 'inputUserFromMessage', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, msg_id?: int, user_id?: int}} $scope Command scope @see https://docs.madelineproto.xyz/API_docs/types/BotCommandScope.html
     *
     *
     * @param string $lang_code Language code
     *
     *
     * @return list<array{_: 'botCommand', command: string, description: string}> Array of  @see https://docs.madelineproto.xyz/API_docs/types/BotCommand.html
     */
    public function getBotCommands(array $scope, string $lang_code = ''): array;

    /**
     * Sets the [menu button action »](https://core.telegram.org/api/bots/menu) for a given user or for all users.
     *
     * @param array{_: 'inputUserEmpty'}|array{_: 'inputUserSelf'}|array{_: 'inputUser', user_id?: int, access_hash?: int}|array{_: 'inputUserFromMessage', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, msg_id?: int, user_id?: int} $user_id User ID @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     *
     *
     * @param array{_: 'botMenuButtonDefault'}|array{_: 'botMenuButtonCommands'}|array{_: 'botMenuButton', text?: string, url?: string} $button Bot menu button action @see https://docs.madelineproto.xyz/API_docs/types/BotMenuButton.html
     *
     *
     */
    public function setBotMenuButton(array $user_id, array $button): bool;

    /**
     * Gets the menu button action for a given user or for all users, previously set using [bots.setBotMenuButton](https://docs.madelineproto.xyz/API_docs/methods/bots.setBotMenuButton.html); users can see this information in the [botInfo](https://docs.madelineproto.xyz/API_docs/constructors/botInfo.html) constructor.
     *
     * @param array{_: 'inputUserEmpty'}|array{_: 'inputUserSelf'}|array{_: 'inputUser', user_id?: int, access_hash?: int}|array{_: 'inputUserFromMessage', peer: array{_: 'inputPeerEmpty'}|array{_: 'inputPeerSelf'}|array{_: 'inputPeerUser', user_id?: int, access_hash?: int}|array{_: 'inputPeerChannel', channel_id?: int, access_hash?: int}, msg_id?: int, user_id?: int} $user_id User ID or empty for the default menu button. @see https://docs.madelineproto.xyz/API_docs/types/InputUser.html
     *
     *
     * @return array{_: 'botMenuButtonDefault'}|array{_: 'botMenuButtonCommands'}|array{_: 'botMenuButton', text: string, url: string} @see https://docs.madelineproto.xyz/API_docs/types/BotMenuButton.html
     */
    public function getBotMenuButton(array $user_id): array;

    /**
     * Set the default [suggested admin rights](https://core.telegram.org/api/rights#suggested-bot-rights) for bots being added as admins to channels, see [here for more info on how to handle them »](https://core.telegram.org/api/rights#suggested-bot-rights).
     *
     * @param array{_: 'chatAdminRights', change_info?: bool, post_messages?: bool, edit_messages?: bool, delete_messages?: bool, ban_users?: bool, invite_users?: bool, pin_messages?: bool, add_admins?: bool, anonymous?: bool, manage_call?: bool, other?: bool, manage_topics?: bool} $admin_rights Admin rights @see https://docs.madelineproto.xyz/API_docs/types/ChatAdminRights.html
     *
     *
     */
    public function setBotBroadcastDefaultAdminRights(array $admin_rights): bool;

    /**
     * Set the default [suggested admin rights](https://core.telegram.org/api/rights#suggested-bot-rights) for bots being added as admins to groups, see [here for more info on how to handle them »](https://core.telegram.org/api/rights#suggested-bot-rights).
     *
     * @param array{_: 'chatAdminRights', change_info?: bool, post_messages?: bool, edit_messages?: bool, delete_messages?: bool, ban_users?: bool, invite_users?: bool, pin_messages?: bool, add_admins?: bool, anonymous?: bool, manage_call?: bool, other?: bool, manage_topics?: bool} $admin_rights Admin rights @see https://docs.madelineproto.xyz/API_docs/types/ChatAdminRights.html
     *
     *
     */
    public function setBotGroupDefaultAdminRights(array $admin_rights): bool;
}
