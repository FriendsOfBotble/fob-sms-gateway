<?php

namespace FriendsOfBotble\Sms\Http\Middleware;

use Botble\Base\Facades\BaseHelper;
use Closure;
use FriendsOfBotble\Sms\Facades\Guard;
use Illuminate\Http\Request;

class RedirectIfPhoneIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (! setting('fob_otp_phone_verification_enabled', false)) {
            abort(404);
        }

        $user = $request->user(Guard::getGuard());

        if (! $user->phone || $user->phone_verified_at) {
            return redirect()->to(BaseHelper::getHomepageUrl());
        }

        return $next($request);
    }
}
