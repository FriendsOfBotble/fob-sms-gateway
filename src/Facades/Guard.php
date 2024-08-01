<?php

namespace FriendsOfBotble\Sms\Facades;

use FriendsOfBotble\Sms\GuardManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static array getGuards()
 * @method static string getGuard()
 * @method static string getTable(?string $guard = null)
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
