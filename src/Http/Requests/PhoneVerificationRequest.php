<?php

namespace FriendsOfBotble\Sms\Http\Requests;

use Botble\Support\Http\Requests\Request;

class PhoneVerificationRequest extends Request
{
    public function rules(): array
    {
        return [
            'otp' => ['required', 'digits:6'],
        ];
    }
}
