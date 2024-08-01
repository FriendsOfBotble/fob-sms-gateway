<?php

return [
    [
        'name' => 'SMS',
        'flag' => 'sms',
        'parent_flag' => null,
    ],
    [
        'name' => 'SMS Gateways',
        'flag' => 'sms.gateways.index',
        'parent_flag' => 'sms',
    ],
    [
        'name' => 'SMS Logs',
        'flag' => 'sms.logs',
        'parent_flag' => 'sms',
    ],
];
