<?php

namespace FriendsOfBotble\Sms\DataTransferObjects;

class SmsResponse
{
    public function __construct(
        public bool $success,
        public ?string $messageId = null,
        public array $response = [],
    ) {
    }
}
