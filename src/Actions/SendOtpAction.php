<?php

namespace FriendsOfBotble\Sms\Actions;

use FriendsOfBotble\Sms\Facades\Otp;
use FriendsOfBotble\Sms\Facades\Sms;

class SendOtpAction
{
    public function __invoke(string $phone): void
    {
        $otp = Otp::generate($phone);

        $message = str_replace(
            '{code}',
            $otp->token,
            setting('fob_otp_message', 'Your OTP code is: {code}')
        );

        Sms::send($phone, $message);
    }
}
