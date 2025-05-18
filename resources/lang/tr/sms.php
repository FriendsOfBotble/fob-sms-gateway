<?php

return [
    'name' => 'SMS Ağ Geçitleri',

    'settings' => [
        'title' => 'SMS',
        'description' => 'SMS mesajları göndermek için ayarları yapılandırın.',
        'form' => [
            'default_sms_provider' => 'Varsayılan SMS Sağlayıcısı',
            'default_sms_provider_help' => 'Bu, SMS mesajları göndermek için kullanılacak varsayılan SMS sağlayıcısıdır.',
        ],
    ],

    'configure_button' => 'Yapılandır',
    'save_button' => 'Kaydet',
    'activate_button' => 'Etkinleştir',
    'deactivate_button' => 'Devre Dışı Bırak',
    'test_button' => 'Test SMS\'i Gönder',
    'test_modal' => [
        'title' => 'Test SMS\'i Gönder',
        'description' => 'Test SMS mesajı göndermek için mesaj ayrıntılarını girin.',
        'to' => 'Alıcı',
        'to_placeholder' => 'Test SMS mesajını göndermek için telefon numarasını girin.',
        'message' => 'Mesaj',
    ],
    'gateway_description' => ':name kullanarak SMS mesajları gönderin.',
    'send_sms_failed' => 'SMS mesajı gönderilirken bir hata oluştu. SMS Günlükleri bölümünde yanıtı kontrol etmeyi düşünün.',
    'sms_sent' => 'SMS mesajı başarıyla gönderildi.',

    'enums' => [
        'log_statuses' => [
            'pending' => 'Beklemede',
            'success' => 'Başarılı',
            'failed' => 'Başarısız',
        ],
    ],

    'logs' => [
        'title' => 'SMS Günlükleri',
        'detail_title' => 'SMS Günlüğü #:id',
        'id' => 'ID',
        'message_id' => 'Mesaj ID',
        'provider' => 'Sağlayıcı',
        'from' => 'Gönderen',
        'to' => 'Alıcı',
        'message' => 'Mesaj',
        'status' => 'Durum',
        'sent_at' => 'Gönderilme Zamanı',
        'response' => 'Yanıt',
    ],
];
