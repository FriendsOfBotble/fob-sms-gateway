<h3>{{ trans('plugins/fob-sms-gateway::msg91.instructions.configuration_guide') }}</h3>
<ol>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::msg91.instructions.sign_up') }}:</strong>
        <p>
            {!! BaseHelper::clean(trans('plugins/fob-sms-gateway::msg91.instructions.sign_up_description', [
                'link' => Html::link('https://msg91.com/signup', 'MSG91', ['target' => '_blank']),
            ])) !!}
        </p>
    </li>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::msg91.instructions.get_auth_key') }}:</strong>
        <p>
            {!! BaseHelper::clean(trans('plugins/fob-sms-gateway::msg91.instructions.get_auth_key_description', [
                'link' => Html::link('https://control.msg91.com/app/m/l/settings/security/authkey', trans('plugins/fob-sms-gateway::msg91.instructions.dashboard'), ['target' => '_blank']),
            ])) !!}
        </p>
    </li>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::msg91.instructions.create_flow') }}:</strong>
        <p>{!! BaseHelper::clean(trans('plugins/fob-sms-gateway::msg91.instructions.create_flow_description')) !!}</p>
    </li>
    <li>
        <strong>{{ trans('plugins/fob-sms-gateway::msg91.instructions.get_flow_id') }}:</strong>
        <p>{!! BaseHelper::clean(trans('plugins/fob-sms-gateway::msg91.instructions.get_flow_id_description')) !!}</p>
    </li>
</ol>
