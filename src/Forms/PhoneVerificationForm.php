<?php

namespace FriendsOfBotble\Sms\Forms;

use Botble\Base\Forms\FieldOptions\ButtonFieldOption;
use Botble\Base\Forms\FieldOptions\HtmlFieldOption;
use Botble\Base\Forms\FieldOptions\TextFieldOption;
use Botble\Base\Forms\Fields\HtmlField;
use Botble\Base\Forms\Fields\TextField;
use Botble\Base\Forms\FormAbstract;

class PhoneVerificationForm extends FormAbstract
{
    public function setup(): void
    {
        $this
            ->contentOnly()
            ->add(
                'otp',
                TextField::class,
                TextFieldOption::make()
                    ->label(false)
                    ->required()
                    ->attributes([
                        'autocomplete' => 'one-time-code',
                        'autofocus' => true,
                        'inputmode' => 'numeric',
                        'maxlength' => 6,
                        'pattern' => '\d{6}',
                    ])
            )
            ->add(
                'resend',
                HtmlField::class,
                HtmlFieldOption::make()->content(view('plugins/sms::phone-verification.resend'))
            )
            ->add(
                'submit',
                'submit',
                ButtonFieldOption::make()
                    ->label(__('Verify'))
                    ->cssClass('btn btn-primary w-100')
            );
    }
}
