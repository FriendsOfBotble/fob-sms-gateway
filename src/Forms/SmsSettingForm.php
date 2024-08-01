<?php

namespace FriendsOfBotble\Sms\Forms;

use Botble\Base\Forms\FieldOptions\AlertFieldOption;
use Botble\Base\Forms\FieldOptions\LabelFieldOption;
use Botble\Base\Forms\FieldOptions\NumberFieldOption;
use Botble\Base\Forms\FieldOptions\OnOffFieldOption;
use Botble\Base\Forms\FieldOptions\RadioFieldOption;
use Botble\Base\Forms\FieldOptions\SelectFieldOption;
use Botble\Base\Forms\FieldOptions\TextareaFieldOption;
use Botble\Base\Forms\Fields\AlertField;
use Botble\Base\Forms\Fields\LabelField;
use Botble\Base\Forms\Fields\NumberField;
use Botble\Base\Forms\Fields\OnOffCheckboxField;
use Botble\Base\Forms\Fields\RadioField;
use Botble\Base\Forms\Fields\SelectField;
use Botble\Base\Forms\Fields\TextareaField;
use Botble\Base\Forms\FormAbstract;
use Botble\Setting\Forms\SettingForm;
use FriendsOfBotble\Sms\Facades\Guard;
use FriendsOfBotble\Sms\Facades\Sms;
use FriendsOfBotble\Sms\Http\Requests\SmsSettingRequest;

class SmsSettingForm extends SettingForm
{
    public function setup(): void
    {
        parent::setup();

        $this
            ->contentOnly()
            ->setSectionTitle(trans('plugins/sms::sms.settings.title'))
            ->setSectionDescription(trans('plugins/sms::sms.settings.description'))
            ->setValidatorClass(SmsSettingRequest::class)
            ->setUrl(route('sms.gateways.settings'))
            ->add(
                'sms_default_driver',
                SelectField::class,
                SelectFieldOption::make()
                    ->label(trans('plugins/sms::sms.settings.form.default_sms_provider'))
                    ->selected(Sms::getDefaultDriver())
                    ->choices(Sms::getProviders())
                    ->helperText(trans('plugins/sms::sms.settings.form.default_sms_provider_help'))
            )
            ->addOpenFieldset('otp')
            ->add(
                'fob_otp_heading',
                LabelField::class,
                LabelFieldOption::make()
                    ->label(trans('plugins/sms::otp.settings.description'))
            )
            ->when(! Guard::getGuard(), function (FormAbstract $form) {
                $form->add(
                    'setup_guard_alert',
                    AlertField::class,
                    AlertFieldOption::make()
                        ->type('warning')
                        ->content(
                            trans('plugins/sms::otp.settings.form.setup_guard_alert')
                        )
                );
            })
            ->add(
                'fob_otp_guard',
                RadioField::class,
                RadioFieldOption::make()
                    ->label(trans('plugins/sms::otp.settings.form.guard'))
                    ->helperText(trans('plugins/sms::otp.settings.form.guard_help'))
                    ->selected(setting('fob_otp_guard'))
                    ->choices(array_combine(Guard::getGuards(), Guard::getGuards()))
            )
            ->when(Guard::getGuard(), function (FormAbstract $form) {
                $form
                    ->add(
                        'fob_otp_expires_in',
                        NumberField::class,
                        NumberFieldOption::make()
                            ->label(trans('plugins/sms::otp.settings.form.expires_in'))
                            ->helperText(trans('plugins/sms::otp.settings.form.expires_in_help'))
                            ->value(setting('fob_otp_expires_in', 5))
                    )
                    ->add(
                        'fob_otp_phone_verification_enabled',
                        OnOffCheckboxField::class,
                        OnOffFieldOption::make()
                            ->label(trans('plugins/sms::otp.settings.form.phone_verification'))
                            ->value(setting('fob_otp_phone_verification_enabled', false))
                    )
                    ->add(
                        'fob_otp_requires_phone_verification',
                        OnOffCheckboxField::class,
                        OnOffFieldOption::make()
                            ->collapsible('fob_otp_phone_verification_enabled', true, setting('fob_otp_phone_verification_enabled', false))
                            ->label(trans('plugins/sms::otp.settings.form.requires_phone_verification'))
                            ->helperText(trans('plugins/sms::otp.settings.form.requires_phone_verification_help'))
                            ->value(setting('fob_otp_requires_phone_verification', false))
                    )
                    ->add(
                        'fob_otp_message',
                        TextareaField::class,
                        TextareaFieldOption::make()
                            ->label(trans('plugins/sms::otp.settings.form.message'))
                            ->helperText(trans('plugins/sms::otp.settings.form.message_help'))
                            ->value(setting('fob_otp_message', 'Your OTP code is: {code}'))
                    );
            })
            ->addCloseFieldset('otp');
    }
}
