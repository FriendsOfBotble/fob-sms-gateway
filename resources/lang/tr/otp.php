<?php

return [
    'settings' => [
        'description' => 'OTP sona erme süresini ve telefon doğrulama gereksinimlerini yapılandırın.',
        'form' => [
            'setup_guard_alert' => 'OTP ayarlarını yapılandırmadan önce lütfen bir koruma seçin ve ayarları kaydedin.',
            'guard' => 'Koruma',
            'guard_help' => 'OTP doğrulaması için kullanılacak koruma.',
            'expires_in' => 'OTP Kodu Sona Erme Süresi',
            'expires_in_help' => 'OTP kodunun sona ereceği dakika cinsinden süre. Varsayılan 5 dakikadır.',
            'phone_verification' => 'Telefon doğrulamayı etkinleştir',
            'requires_phone_verification' => 'Telefon doğrulaması gerektirir',
            'requires_phone_verification_help' => 'Etkinleştirilirse, kullanıcılar sistemi kullanabilmek için telefon numaralarını doğrulamalıdır.',
            'message' => 'OTP Mesajı',
            'message_help' => 'Kullanıcıya gönderilecek mesaj. OTP kodunu eklemek için {code} kullanın.',
        ],
    ],
];
