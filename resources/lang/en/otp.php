<?php

return [
    'settings' => [
        'description' => 'Configure OTP expiration time and phone verification requirements.',
        'form' => [
            'setup_guard_alert' => 'Please select a guard and save the settings before you can configure the OTP settings.',
            'guard' => 'Guard',
            'guard_help' => 'The guard that will be used for OTP verification.',
            'expires_in' => 'OTP Code Expire Time',
            'expires_in_help' => 'The time in minutes that the OTP code will expire. Default is 5 minutes.',
            'phone_verification' => 'Enable phone verification',
            'requires_phone_verification' => 'Require phone verification',
            'requires_phone_verification_help' => 'If enabled, users must verify their phone number before they can use the system.',
            'message' => 'OTP Message',
            'message_help' => 'The message that will be sent to the user. Use {code} to insert the OTP code.',
        ],
    ],
];
