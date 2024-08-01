<?php

namespace FriendsOfBotble\Sms\Http\Requests;

use Botble\Support\Http\Requests\Request;
use FriendsOfBotble\Sms\Facades\Sms;
use Illuminate\Validation\Rule;

class SmsTestRequest extends Request
{
    public function rules(): array
    {
        return [
            'gateway' => ['required', 'string', Rule::in(array_keys(Sms::getProviders(activated: true)))],
            'to' => ['required', 'string'],
            'message' => ['required', 'string'],
        ];
    }
}
