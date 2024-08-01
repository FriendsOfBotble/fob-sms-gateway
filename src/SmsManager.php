<?php

namespace FriendsOfBotble\Sms;

use FriendsOfBotble\Sms\Contracts\Factory;
use FriendsOfBotble\Sms\Drivers\Nexmo;
use FriendsOfBotble\Sms\Drivers\Twilio;
use Illuminate\Support\Collection;
use Illuminate\Support\Manager as BaseManager;

class SmsManager extends BaseManager implements Factory
{
    public function createTwilioDriver(): Twilio
    {
        return new Twilio();
    }

    public function createNexmoDriver(): Nexmo
    {
        return new Nexmo();
    }

    public function getDefaultDriver(): string
    {
        return setting('fob_sms_default_driver', 'twilio');
    }

    public function getDrivers(): array
    {
        return [
            ...$this->customCreators,
            'twilio' => fn () => $this->createTwilioDriver(),
            'nexmo' => fn () => $this->createNexmoDriver(),
        ];
    }

    public function getProviders(bool $activated = false): array
    {
        return collect(array_keys($this->getDrivers()))
            ->mapWithKeys(fn (string $driver) => [$driver => $this->driver($driver)->getName()])
            ->when($activated, fn (Collection $providers) => $providers->reject(fn (string $driver) => ! $this->driver($driver)->isEnabled()))
            ->all();
    }

    public function getSetting(string $key, ?string $driver = null, mixed $default = null): mixed
    {
        $driver = $driver ?? $this->getDefaultDriver();

        return setting("fob_sms_{$driver}_{$key}", $default);
    }
}
