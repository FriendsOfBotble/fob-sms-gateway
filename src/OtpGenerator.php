<?php

namespace FriendsOfBotble\Sms;

use Carbon\Carbon;
use FriendsOfBotble\Sms\Contracts\Otp as OtpContract;
use FriendsOfBotble\Sms\Models\SmsOtp;

class OtpGenerator implements OtpContract
{
    public function __construct(
        protected int $validity,
        protected int $length = 6,
    ) {
    }

    public function generate(string $identifier): SmsOtp
    {
        /** @var \FriendsOfBotble\Sms\Models\SmsOtp $otp */
        $otp =  SmsOtp::query()->updateOrCreate([
            'identifier' => $identifier,
        ], [
            'token' => $this->createToken(),
            'validity' => $this->validity,
            'generated_at' => Carbon::now(),
        ]);

        return $otp;
    }

    public function verify(string $identifier, string $token): bool
    {
        $otp = SmsOtp::query()->where('identifier', $identifier)->first();

        if (! $otp) {
            return false;
        }

        if ($otp->token !== $token) {
            return false;
        }

        if ($otp->generated_at->addMinutes($this->validity)->isPast()) {
            return false;
        }

        $otp->delete();

        return true;
    }

    public function getExpiryTime(string $identifier): Carbon
    {
        $otp = SmsOtp::query()->where('identifier', $identifier)->first();

        if (! $otp) {
            return Carbon::now();
        }

        return $otp->generated_at->addMinutes($this->validity);
    }

    protected function createToken(): string
    {
        $characters = '0123456789';
        $length = strlen($characters);
        $pin = '';

        for ($i = 0; $i < $this->length; $i++) {
            $pin .= $characters[rand(0, $length - 1)];
        }

        return $pin;
    }
}
