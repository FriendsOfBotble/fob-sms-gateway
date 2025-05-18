<?php

namespace FriendsOfBotble\Sms\Forms;

use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\TextField;

class TwilioGatewayForm extends SmsGatewayForm
{
    protected array $sensitiveFields = [
        'sid',
        'token',
    ];

    public function setup(): void
    {
        parent::setup();

        $this
            ->add(
                'sid',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::twilio.sid'))
                    ->required()
            )
            ->add(
                'token',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::twilio.token'))
                    ->required()
            )
            ->add(
                'from',
                TextField::class,
                TextFieldOption::make()
                    ->label(trans('plugins/fob-sms-gateway::twilio.from'))
                    ->helperText(trans('plugins/fob-sms-gateway::twilio.from_help'))
                    ->required()
            );
    }
}
