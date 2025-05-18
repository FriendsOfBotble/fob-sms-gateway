<?php

namespace FriendsOfBotble\Sms\Forms;

use Botble\Base\Facades\Html;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;

class Msg91GatewayForm extends SmsGatewayForm
{
    protected array $sensitiveFields = [
        'auth_key',
    ];

    public function setup(): void
    {
        parent::setup();

        $this
            ->add(
                'auth_key',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::msg91.auth_key'))
                    ->required()
            )
            ->add(
                'from',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::msg91.from'))
                    ->helperText(trans('plugins/fob-sms-gateway::msg91.from_help'))
                    ->required()
            )
            ->add(
                'flow_id',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::msg91.flow_id'))
                    ->helperText(trans('plugins/fob-sms-gateway::msg91.flow_id_help', [
                        'link' => Html::link(
                            'https://msg91.com/help/Template/how-to-create-flow-id-to-send-sms-via-api',
                            trans('plugins/fob-sms-gateway::msg91.here'),
                            ['target' => '_blank']
                        ),
                    ]))
                    ->required()
            );
    }
}
