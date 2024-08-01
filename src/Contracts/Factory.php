<?php

namespace FriendsOfBotble\Sms\Contracts;

interface Factory
{
    /**
     * @param  string|null  $driver
     * @return \FriendsOfBotble\Sms\Contracts\Driver
     */
    public function driver($driver = null);
}
