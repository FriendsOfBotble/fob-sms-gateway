<?php

namespace FriendsOfBotble\Sms\Http\Controllers;

use Botble\Base\Http\Controllers\BaseController;
use FriendsOfBotble\Sms\Actions\SendOtpAction;
use FriendsOfBotble\Sms\Facades\Guard;
use Illuminate\Http\Request;

class ResendOtpController extends BaseController
{
    public function __invoke(Request $request, SendOtpAction $sendOtpAction)
    {
        $user = $request->user(Guard::getGuard());

        $sendOtpAction($user->phone);

        return $this
            ->httpResponse()
            ->setNextUrl(route('otp.verify'))
            ->setMessage(__('OTP code has been sent to your phone number.'));
    }
}
