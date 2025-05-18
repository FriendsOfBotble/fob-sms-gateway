<?php

return [
    'name' => 'Pasarelas SMS',

    'settings' => [
        'title' => 'SMS',
        'description' => 'Configure los ajustes para enviar mensajes SMS.',
        'form' => [
            'default_sms_provider' => 'Proveedor SMS Predeterminado',
            'default_sms_provider_help' => 'Este es el proveedor SMS predeterminado que se utilizará para enviar mensajes SMS.',
        ],
    ],

    'configure_button' => 'Configurar',
    'save_button' => 'Guardar',
    'activate_button' => 'Activar',
    'deactivate_button' => 'Desactivar',
    'test_button' => 'Enviar SMS de Prueba',
    'test_modal' => [
        'title' => 'Enviar SMS de Prueba',
        'description' => 'Ingrese los detalles del mensaje para enviar un mensaje SMS de prueba.',
        'to' => 'Enviar A',
        'to_placeholder' => 'Ingrese el número de teléfono al que enviar el mensaje SMS de prueba.',
        'message' => 'Mensaje',
    ],
    'gateway_description' => 'Enviar mensajes SMS usando :name.',
    'send_sms_failed' => 'Se produjo un error al enviar el mensaje SMS. Considere verificar la respuesta en la sección de Registros SMS.',
    'sms_sent' => 'El mensaje SMS ha sido enviado con éxito.',

    'enums' => [
        'log_statuses' => [
            'pending' => 'Pendiente',
            'success' => 'Éxito',
            'failed' => 'Fallido',
        ],
    ],

    'logs' => [
        'title' => 'Registros SMS',
        'detail_title' => 'Registro SMS #:id',
        'id' => 'ID',
        'message_id' => 'ID de Mensaje',
        'provider' => 'Proveedor',
        'from' => 'De',
        'to' => 'Para',
        'message' => 'Mensaje',
        'status' => 'Estado',
        'sent_at' => 'Enviado El',
        'response' => 'Respuesta',
    ],
];
