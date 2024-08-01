<?php

namespace FriendsOfBotble\Sms\Contracts;

use Carbon\Carbon;
use FriendsOfBotble\Sms\Models\SmsOtp as Model;

interface Otp
{
    public function generate(string $identifier): Model;

    public function verify(string $identifier, string $token): bool;

    public function getExpiryTime(string $identifier): Carbon;
}
