<?php

return [
    'name' => 'Passerelles SMS',

    'settings' => [
        'title' => 'SMS',
        'description' => 'Configurez les paramètres pour l\'envoi de messages SMS.',
        'form' => [
            'default_sms_provider' => 'Fournisseur SMS par défaut',
            'default_sms_provider_help' => 'C\'est le fournisseur SMS par défaut qui sera utilisé pour envoyer des messages SMS.',
        ],
    ],

    'configure_button' => 'Configurer',
    'save_button' => 'Enregistrer',
    'activate_button' => 'Activer',
    'deactivate_button' => 'Désactiver',
    'test_button' => 'Envoyer un SMS de test',
    'test_modal' => [
        'title' => 'Envoyer un SMS de test',
        'description' => 'Entrez les détails du message pour envoyer un message SMS de test.',
        'to' => 'Envoyer à',
        'to_placeholder' => 'Entrez le numéro de téléphone auquel envoyer le message SMS de test.',
        'message' => 'Message',
    ],
    'gateway_description' => 'Envoyer des messages SMS en utilisant :name.',
    'send_sms_failed' => 'Une erreur s\'est produite lors de l\'envoi du message SMS. Envisagez de vérifier la réponse dans la section Journaux SMS.',
    'sms_sent' => 'Le message SMS a été envoyé avec succès.',

    'enums' => [
        'log_statuses' => [
            'pending' => 'En attente',
            'success' => 'Succès',
            'failed' => 'Échec',
        ],
    ],

    'logs' => [
        'title' => 'Journaux SMS',
        'detail_title' => 'Journal SMS #:id',
        'id' => 'ID',
        'message_id' => 'ID du message',
        'provider' => 'Fournisseur',
        'from' => 'De',
        'to' => 'À',
        'message' => 'Message',
        'status' => 'Statut',
        'sent_at' => 'Envoyé le',
        'response' => 'Réponse',
    ],
];
