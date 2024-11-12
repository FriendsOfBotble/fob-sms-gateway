<?php

namespace FriendsOfBotble\Sms\Facades;

use FriendsOfBotble\Sms\Contracts\Factory;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \FriendsOfBotble\Sms\Drivers\Twilio createTwilioDriver()
 * @method static \FriendsOfBotble\Sms\Drivers\Nexmo createNexmoDriver()
 * @method static string getDefaultDriver()
 * @method static array getDrivers()
 * @method static array getProviders(bool $activated = false)
 * @method static mixed|null getSetting(string $key, string|null $driver = null, mixed|null $default = null)
 * @method static mixed driver(string|null $driver = null)
 * @method static \FriendsOfBotble\Sms\SmsManager extend(string $driver, \Closure $callback)
 * @method static \Illuminate\Contracts\Container\Container getContainer()
 * @method static \FriendsOfBotble\Sms\SmsManager setContainer(\Illuminate\Contracts\Container\Container $container)
 * @method static \FriendsOfBotble\Sms\SmsManager forgetDrivers()
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
