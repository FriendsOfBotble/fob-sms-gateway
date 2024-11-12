<?php

namespace FriendsOfBotble\Sms\Facades;

use FriendsOfBotble\Sms\GuardManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string|null getGuard()
 * @method static string getTable(string|null $guard = null)
 * @method static array getGuards()
 *
 * @see \FriendsOfBotble\Sms\GuardManager
 */
class Guard extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return GuardManager::class;
    }
}
