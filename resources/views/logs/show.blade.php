@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    <x-core::card>
        <x-core::card.header>
            <x-core::card.title>
                {{ trans('plugins/sms::sms.logs.detail_title', ['id' => $smsLog->getKey()]) }}
            </x-core::card.title>
        </x-core::card.header>

        <x-core::card.body>
            <x-core::datagrid>
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.id') }}</x-slot:title>
                    #{{ $smsLog->getKey() }}
                </x-core::datagrid.item>
                @if($smsLog->message_id)
                    <x-core::datagrid.item>
                        <x-slot:title>{{ trans('plugins/sms::sms.logs.message_id') }}</x-slot:title>
                        {{ $smsLog->message_id }}
                    </x-core::datagrid.item>
                @endif
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.provider') }}</x-slot:title>
                    {{ \FriendsOfBotble\Sms\Facades\Sms::driver($smsLog->driver)->getName() }}
                </x-core::datagrid.item>
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.from') }}</x-slot:title>
                    {{ $smsLog->from }}
                </x-core::datagrid.item>
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.to') }}</x-slot:title>
                    {{ $smsLog->to }}
                </x-core::datagrid.item>
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.message') }}</x-slot:title>
                    {{ $smsLog->message }}
                </x-core::datagrid.item>
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.status') }}</x-slot:title>
                    {!! $smsLog->status->toHtml() !!}
                </x-core::datagrid.item>
                <x-core::datagrid.item>
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.sent_at') }}</x-slot:title>
                    {{ $smsLog->created_at }}
                </x-core::datagrid.item>
            </x-core::datagrid>

            @if($smsLog->response)
                <x-core::datagrid.item class="mt-3">
                    <x-slot:title>{{ trans('plugins/sms::sms.logs.response') }}</x-slot:title>
                    <pre>{{ is_array($smsLog->response) ? json_encode($smsLog->response, JSON_PRETTY_PRINT) : $smsLog->response }}</pre>
                </x-core::datagrid.item>
            @endif
        </x-core::card.body>
    </x-core::card>
@stop
