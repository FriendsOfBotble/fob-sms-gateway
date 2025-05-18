<?php

return [
    'settings' => [
        'description' => 'Configurez le temps d\'expiration OTP et les exigences de vérification téléphonique.',
        'form' => [
            'setup_guard_alert' => 'Veuillez sélectionner un garde et enregistrer les paramètres avant de pouvoir configurer les paramètres OTP.',
            'guard' => 'Garde',
            'guard_help' => 'Le garde qui sera utilisé pour la vérification OTP.',
            'expires_in' => 'Temps d\'expiration du code OTP',
            'expires_in_help' => 'Le temps en minutes après lequel le code OTP expirera. La valeur par défaut est de 5 minutes.',
            'phone_verification' => 'Activer la vérification téléphonique',
            'requires_phone_verification' => 'Exiger la vérification téléphonique',
            'requires_phone_verification_help' => 'Si activé, les utilisateurs doivent vérifier leur numéro de téléphone avant de pouvoir utiliser le système.',
            'message' => 'Message OTP',
            'message_help' => 'Le message qui sera envoyé à l\'utilisateur. Utilisez {code} pour insérer le code OTP.',
        ],
    ],
];
