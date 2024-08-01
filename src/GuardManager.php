<?php

namespace FriendsOfBotble\Sms;

use Illuminate\Support\Arr;

class GuardManager
{
    public function __construct(
        protected ?string $guard = null
    ) {
    }

    public function getGuard(): ?string
    {
        return $this->guard;
    }

    public function getTable(?string $guard = null): string
    {
        $guard = $guard ?? $this->guard;

        $provider = config("auth.guards.{$guard}.provider");
        $model = config("auth.providers.{$provider}.model");

        return (new $model())->getTable();
    }

    public function getGuards(): array
    {
        return array_keys(Arr::except(config('auth.guards'), ['web', 'sanctum']));
    }
}
