<?php

return [
    'settings' => [
        'description' => 'Konfigurasikan waktu kedaluwarsa OTP dan persyaratan verifikasi telepon.',
        'form' => [
            'setup_guard_alert' => 'Silakan pilih penjaga dan simpan pengaturan sebelum Anda dapat mengonfigurasi pengaturan OTP.',
            'guard' => 'Penjaga',
            'guard_help' => 'Penjaga yang akan digunakan untuk verifikasi OTP.',
            'expires_in' => 'Waktu Kedaluwarsa Kode OTP',
            'expires_in_help' => 'Waktu dalam menit di mana kode OTP akan kedaluwarsa. Default adalah 5 menit.',
            'phone_verification' => 'Aktifkan verifikasi telepon',
            'requires_phone_verification' => 'Memerlukan verifikasi telepon',
            'requires_phone_verification_help' => 'Jika diaktifkan, pengguna harus memverifikasi nomor telepon mereka sebelum dapat menggunakan sistem.',
            'message' => 'Pesan OTP',
            'message_help' => 'Pesan yang akan dikirim ke pengguna. Gunakan {code} untuk menyisipkan kode OTP.',
        ],
    ],
];
