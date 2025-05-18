<?php

return [
    'name' => 'Gateway SMS',

    'settings' => [
        'title' => 'SMS',
        'description' => 'Konfigurasikan pengaturan untuk mengirim pesan SMS.',
        'form' => [
            'default_sms_provider' => 'Penyedia SMS Default',
            'default_sms_provider_help' => 'Ini adalah penyedia SMS default yang akan digunakan untuk mengirim pesan SMS.',
        ],
    ],

    'configure_button' => 'Konfigurasi',
    'save_button' => 'Simpan',
    'activate_button' => 'Aktifkan',
    'deactivate_button' => 'Nonaktifkan',
    'test_button' => 'Kirim SMS Uji',
    'test_modal' => [
        'title' => 'Kirim SMS Uji',
        'description' => 'Masukkan detail pesan untuk mengirim pesan SMS uji.',
        'to' => 'Kirim Ke',
        'to_placeholder' => 'Masukkan nomor telepon untuk mengirim pesan SMS uji.',
        'message' => 'Pesan',
    ],
    'gateway_description' => 'Kirim pesan SMS menggunakan :name.',
    'send_sms_failed' => 'Terjadi kesalahan saat mengirim pesan SMS. Pertimbangkan untuk memeriksa respons di bagian Log SMS.',
    'sms_sent' => 'Pesan SMS telah berhasil dikirim.',

    'enums' => [
        'log_statuses' => [
            'pending' => 'Tertunda',
            'success' => 'Berhasil',
            'failed' => 'Gagal',
        ],
    ],

    'logs' => [
        'title' => 'Log SMS',
        'detail_title' => 'Log SMS #:id',
        'id' => 'ID',
        'message_id' => 'ID Pesan',
        'provider' => 'Penyedia',
        'from' => 'Dari',
        'to' => 'Ke',
        'message' => 'Pesan',
        'status' => 'Status',
        'sent_at' => 'Dikirim Pada',
        'response' => 'Respons',
    ],
];
