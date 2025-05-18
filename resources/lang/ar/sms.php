<?php

return [
    'name' => 'بوابات الرسائل القصيرة',

    'settings' => [
        'title' => 'الرسائل القصيرة',
        'description' => 'تكوين الإعدادات لإرسال رسائل SMS.',
        'form' => [
            'default_sms_provider' => 'مزود الرسائل القصيرة الافتراضي',
            'default_sms_provider_help' => 'هذا هو مزود الرسائل القصيرة الافتراضي الذي سيتم استخدامه لإرسال رسائل SMS.',
        ],
    ],

    'configure_button' => 'تكوين',
    'save_button' => 'حفظ',
    'activate_button' => 'تفعيل',
    'deactivate_button' => 'تعطيل',
    'test_button' => 'إرسال رسالة قصيرة اختبارية',
    'test_modal' => [
        'title' => 'إرسال رسالة قصيرة اختبارية',
        'description' => 'أدخل تفاصيل الرسالة لإرسال رسالة SMS اختبارية.',
        'to' => 'إرسال إلى',
        'to_placeholder' => 'أدخل رقم الهاتف لإرسال رسالة SMS الاختبارية إليه.',
        'message' => 'الرسالة',
    ],
    'gateway_description' => 'إرسال رسائل SMS باستخدام :name.',
    'send_sms_failed' => 'حدث خطأ أثناء إرسال رسالة SMS. فكر في التحقق من الاستجابة في قسم سجلات SMS.',
    'sms_sent' => 'تم إرسال رسالة SMS بنجاح.',

    'enums' => [
        'log_statuses' => [
            'pending' => 'قيد الانتظار',
            'success' => 'نجاح',
            'failed' => 'فشل',
        ],
    ],

    'logs' => [
        'title' => 'سجلات SMS',
        'detail_title' => 'سجل SMS #:id',
        'id' => 'المعرف',
        'message_id' => 'معرف الرسالة',
        'provider' => 'المزود',
        'from' => 'من',
        'to' => 'إلى',
        'message' => 'الرسالة',
        'status' => 'الحالة',
        'sent_at' => 'أرسلت في',
        'response' => 'الاستجابة',
    ],
];
