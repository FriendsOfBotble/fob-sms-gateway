<?php

namespace FriendsOfBotble\Sms\Facades;

use FriendsOfBotble\Sms\Contracts\Factory;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \FriendsOfBotble\Sms\Contracts\Driver driver(string $driver = null)
 * @method static bool send(string $to, string $message)
 * @method static mixed getSetting(string $key, ?string $driver = null, mixed $default = null)
 * @method static array getProviders(bool $activated = false)
 *
 * @see \FriendsOfBotble\Sms\SmsManager
 */
class Sms extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return Factory::class;
    }
}
