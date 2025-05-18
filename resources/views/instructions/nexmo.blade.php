<h3>{{ trans('plugins/fob-sms-gateway::nexmo.instructions.configuration_guide') }}</h3>
<ol>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::nexmo.instructions.sign_up') }}:</strong>
        <p>
            {!! BaseHelper::clean(trans('plugins/fob-sms-gateway::nexmo.instructions.sign_up_description', [
                'link' => Html::link('https://dashboard.nexmo.com/sign-up', 'Nexmo', ['target' => '_blank']),
            ])) !!}
        </p>
    </li>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::nexmo.instructions.get_api_key_secret') }}:</strong>
        <p>
            {!! BaseHelper::clean(trans('plugins/fob-sms-gateway::nexmo.instructions.get_api_key_secret_description', [
                'link' => Html::link('https://dashboard.nexmo.com/settings', trans('plugins/fob-sms-gateway::nexmo.instructions.settings_page'), ['target' => '_blank']),
            ])) !!}
        </p>
    </li>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::nexmo.instructions.get_from_number') }}:</strong>
        <p>{!! BaseHelper::clean(trans('plugins/fob-sms-gateway::nexmo.instructions.get_from_number_description')) !!}</p>
    </li>
</ol>
