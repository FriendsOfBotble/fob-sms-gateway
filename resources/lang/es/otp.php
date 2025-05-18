<?php

return [
    'settings' => [
        'description' => 'Configure el tiempo de expiración de OTP y los requisitos de verificación telefónica.',
        'form' => [
            'setup_guard_alert' => 'Por favor, seleccione un guardia y guarde la configuración antes de poder configurar los ajustes de OTP.',
            'guard' => 'Guardia',
            'guard_help' => 'El guardia que se utilizará para la verificación OTP.',
            'expires_in' => 'Tiempo de Expiración del Código OTP',
            'expires_in_help' => 'El tiempo en minutos en que expirará el código OTP. El valor predeterminado es 5 minutos.',
            'phone_verification' => 'Habilitar verificación telefónica',
            'requires_phone_verification' => 'Requerir verificación telefónica',
            'requires_phone_verification_help' => 'Si está habilitado, los usuarios deben verificar su número de teléfono antes de poder usar el sistema.',
            'message' => 'Mensaje OTP',
            'message_help' => 'El mensaje que se enviará al usuario. Use {code} para insertar el código OTP.',
        ],
    ],
];
