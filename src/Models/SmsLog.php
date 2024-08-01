<?php

namespace FriendsOfBotble\Sms\Models;

use Botble\Base\Models\BaseModel;
use FriendsOfBotble\Sms\Enums\SmsStatus;

class SmsLog extends BaseModel
{
    protected $table = 'fob_sms_logs';

    protected $fillable = [
        'driver',
        'message_id',
        'from',
        'to',
        'message',
        'status',
        'response',
    ];

    protected $casts = [
        'status' => SmsStatus::class,
        'response' => 'array',
    ];
}
