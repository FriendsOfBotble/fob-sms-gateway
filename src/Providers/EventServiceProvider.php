<?php

namespace FriendsOfBotble\Sms\Providers;

use FriendsOfBotble\Sms\Listeners\SendOtpNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendOtpNotification::class,
        ],
    ];
}
