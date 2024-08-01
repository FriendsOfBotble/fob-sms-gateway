<?php

namespace FriendsOfBotble\Sms\Listeners;

use FriendsOfBotble\Sms\Actions\SendOtpAction;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOtpNotification implements ShouldQueue
{
    public function __construct(
        protected SendOtpAction $sendOtpAction
    ) {
    }

    public function handle(Registered $event): void
    {
        $user = $event->user;

        if (empty($user->phone)) {
            return;
        }

        ($this->sendOtpAction)($user->phone);
    }
}
