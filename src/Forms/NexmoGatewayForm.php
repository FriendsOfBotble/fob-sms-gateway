<?php

namespace FriendsOfBotble\Sms\Forms;

use Botble\Base\Facades\Html;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;

class NexmoGatewayForm extends SmsGatewayForm
{
    protected array $sensitiveFields = [
        'key',
        'secret',
    ];

    public function setup(): void
    {
        parent::setup();

        $this
            ->add(
                'key',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::nexmo.key'))
                    ->required()
            )
            ->add(
                'secret',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::nexmo.secret'))
                    ->required()
            )
            ->add(
                'from',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::nexmo.from'))
                    ->helperText(trans('plugins/fob-sms-gateway::nexmo.from_help', [
                        'link' => Html::link(
                            'https://developer.vonage.com/en/messaging/sms/guides/custom-sender-id?source=messaging',
                            trans('plugins/fob-sms-gateway::nexmo.here'),
                            ['target' => '_blank']
                        ),
                    ]))
                    ->required()
            );
    }
}
