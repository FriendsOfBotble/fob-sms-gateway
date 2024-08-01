<?php

namespace FriendsOfBotble\Sms\Http\Middleware;

use Closure;
use FriendsOfBotble\Sms\Facades\Guard;
use Illuminate\Http\Request;

class EnsurePhoneIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (setting('fob_otp_phone_verification_enabled', false)) {
            $user = $request->user(Guard::getGuard());

            if (
                ($user
                && $user->phone
                && ! $user->phone_verified_at)
                && setting('fob_otp_requires_phone_verification', false)
            ) {
                return redirect()->route('otp.verify');
            }
        }

        return $next($request);
    }
}
