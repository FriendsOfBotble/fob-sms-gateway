<?php

namespace FriendsOfBotble\Sms\Enums;

use Botble\Base\Facades\BaseHelper;
use Botble\Base\Supports\Enum;

class SmsStatus extends Enum
{
    public const PENDING = 'pending';

    public const SUCCESS = 'success';

    public const FAILED = 'failed';

    protected static $langPath = 'plugins/sms::sms.enums.log_statuses';

    public function toHtml(): string
    {
        $color = match ($this->value) {
            self::PENDING => 'warning',
            self::SUCCESS => 'success',
            self::FAILED => 'danger',
            default => null,
        };

        return BaseHelper::renderBadge($this->label(), $color);
    }
}
