<?php

namespace FriendsOfBotble\Sms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \FriendsOfBotble\Sms\Models\SmsOtp generate(string $identifier)
 * @method static bool verify(string $identifier, string $token)
 * @method static \Carbon\Carbon getExpiryTime(string $identifier)
 *
 * @see \FriendsOfBotble\Sms\Contracts\Otp
 */
class Otp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \FriendsOfBotble\Sms\Contracts\Otp::class;
    }
}
