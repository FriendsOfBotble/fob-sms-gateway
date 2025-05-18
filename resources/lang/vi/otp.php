<?php

return [
    'settings' => [
        'description' => 'Cấu hình thời gian hết hạn OTP và yêu cầu xác minh điện thoại.',
        'form' => [
            'setup_guard_alert' => 'Vui lòng chọn một guard và lưu cài đặt trước khi bạn có thể cấu hình cài đặt OTP.',
            'guard' => 'Guard',
            'guard_help' => 'Guard sẽ được sử dụng cho xác minh OTP.',
            'expires_in' => 'Thời gian hết hạn mã OTP',
            'expires_in_help' => 'Thời gian tính bằng phút mà mã OTP sẽ hết hạn. Mặc định là 5 phút.',
            'phone_verification' => 'Bật xác minh điện thoại',
            'requires_phone_verification' => 'Yêu cầu xác minh điện thoại',
            'requires_phone_verification_help' => 'Nếu được bật, người dùng phải xác minh số điện thoại của họ trước khi có thể sử dụng hệ thống.',
            'message' => 'Tin nhắn OTP',
            'message_help' => 'Tin nhắn sẽ được gửi đến người dùng. Sử dụng {code} để chèn mã OTP.',
        ],
    ],
];
