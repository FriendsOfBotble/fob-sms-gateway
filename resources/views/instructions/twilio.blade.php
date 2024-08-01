<h3>{{ trans('plugins/sms::twilio.instructions.configuration_guide') }}</h3>
<ol>
    <li>
        <strong>{{ trans('plugins/sms::twilio.instructions.sign_up') }}:</strong>
        <p>
            {!! BaseHelper::clean(trans('plugins/sms::twilio.instructions.sign_up_description', [
                'link' => Html::link('https://www.twilio.com', 'Twilio', ['target' => '_blank']),
            ])) !!}
        </p>
    </li>
    <li>
        <strong>{{ trans('plugins/sms::twilio.instructions.get_sid_token') }}:</strong>
        <p>
            {!! BaseHelper::clean(trans('plugins/sms::twilio.instructions.get_sid_token_description', [
                'link' => Html::link('https://www.twilio.com/console', trans('plugins/sms::twilio.instructions.admin_console'), ['target' => '_blank']),
            ])) !!}
        </p>
    </li>
    <li>
        <strong>{{ trans('plugins/sms::twilio.instructions.get_from_number') }}:</strong>
        <p>{!! BaseHelper::clean(trans('plugins/sms::twilio.instructions.get_from_number_description')) !!}</p>
    </li>
</ol>
