<?php

namespace FriendsOfBotble\Sms\Drivers;

use Exception;
use FriendsOfBotble\Sms\Contracts\Driver;
use FriendsOfBotble\Sms\DataTransferObjects\SmsResponse;
use FriendsOfBotble\Sms\Enums\SmsStatus;
use FriendsOfBotble\Sms\Facades\Sms;
use FriendsOfBotble\Sms\Models\SmsLog;

abstract class AbstractDriver implements Driver
{
    abstract protected function performSend(string $to, string $message): SmsResponse;

    public function getFrom(): ?string
    {
        return Sms::getSetting('from', $this->getKey());
    }

    public function send(string $to, string $message): bool
    {
        try {
            $response = $this->performSend($this->normalizePhoneNumber($to), $message);

            $this->log($to, $message, SmsStatus::SUCCESS, $response->response, $response->messageId);

            return $response->success;
        } catch (Exception $e) {
            $this->log($to, $message, SmsStatus::FAILED, [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return false;
        }
    }

    public function getKey(): string
    {
        return str(class_basename(static::class))
            ->beforeLast('Driver')
            ->snake();
    }

    public function getName(): string
    {
        return str(class_basename(static::class))
            ->beforeLast('Driver')
            ->headline();
    }

    public function getDescription(): string
    {
        return trans('plugins/sms::sms.gateway_description', ['name' => $this->getName()]);
    }

    public function isEnabled(): bool
    {
        return (bool) Sms::getSetting('enabled', $this->getKey());
    }

    public function normalizePhoneNumber(string $phone): string
    {
        return $phone;
    }

    protected function log(string $to, string $message, string $status, array $response, ?string $messageId = null): void
    {
        $from = $this->getFrom();

        if (! $from) {
            return;
        }

        SmsLog::query()->create([
            'driver' => $this->getKey(),
            'message_id' => $messageId,
            'to' => $to,
            'from' => $from,
            'message' => $message,
            'response' => $response,
            'status' => $status,
        ]);
    }
}
