@extends(BaseHelper::getAdminMasterLayoutTemplate())

@section('content')
    {!! $form->renderForm() !!}

    <div class="row mt-5">
        <div class="col-md-9 offset-md-3">
            @foreach(array_keys(\FriendsOfBotble\Sms\Facades\Sms::getDrivers()) as $driver)
                @php
                    $driver = \FriendsOfBotble\Sms\Facades\Sms::driver($driver);
                @endphp

                <x-core::card @class(['sms-gateway', 'mb-2' => ! $loop->last])>
                    <x-core::card.body>
                        <div class="d-flex gap-3">
                            <div class="d-flex align-items-center" style="width: 100px;">
                                <img src="{{ $driver->getLogo() }}" alt="{{ $driver->getName() }}">
                            </div>
                            <div>
                                <h3 class="mb-1">{{ $driver->getName() }}</h3>
                                <p class="mb-0">
                                    {{ $driver->getDescription() }}
                                </p>
                            </div>
                        </div>
                    </x-core::card.body>

                    <div class="text-end p-2 border-top">
                        <x-core::button
                                type="button"
                                data-bb-toggle="toggle-setting-form"
                                @style(['display: none' => ! $driver->isEnabled()])
                        >
                            {{ trans('plugins/sms::sms.configure_button') }}
                        </x-core::button>
                        <x-core::button
                                type="button"
                                color="info"
                                data-bb-toggle="change-status"
                                :data-url="route('sms.gateways.change-status', $driver->getKey())"
                                @style(['display: none' => $driver->isEnabled()])
                        >
                            {{ trans('plugins/sms::sms.activate_button') }}
                        </x-core::button>
                    </div>
                    <div class="sms-gateway-content" style="display: none;">
                        <x-core::card.body class="border-top">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! BaseHelper::clean($driver->getInstructions()) !!}
                                </div>
                                <div class="col-md-6">
                                    {!! $driver->getSettingForm()
                                        ->formClass("sms-gateway-form")
                                        ->setUrl(route('sms.gateways.update', $driver->getKey()))
                                        ->gateway($driver->getKey())
                                        ->renderForm() !!}

                                    <x-core::button
                                            type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#test-sms-modal"
                                            data-gateway="{{ $driver->getKey() }}"
                                    >
                                        {{ trans('plugins/sms::sms.test_button') }}
                                    </x-core::button>
                                </div>
                            </div>
                        </x-core::card.body>
                        <x-core::card.footer>
                            <div class="btn-list justify-content-end">
                                <x-core::button
                                        type="button"
                                        data-bb-toggle="change-status"
                                        :data-url="route('sms.gateways.change-status', $driver->getKey())"
                                >
                                    {{ trans('plugins/sms::sms.deactivate_button') }}
                                </x-core::button>
                                <x-core::button
                                        type="submit"
                                        color="primary"
                                        form="friends-of-botble-sms-forms-{{ $driver->getKey() }}-gateway-form"
                                >
                                    {{ trans('plugins/sms::sms.save_button') }}
                                </x-core::button>
                            </div>
                        </x-core::card.footer>
                    </div>
                </x-core::card>
            @endforeach
        </div>
    </div>
@stop

@push('footer')
    <x-core::modal
            id="test-sms-modal"
            :title="trans('plugins/sms::sms.test_modal.title')"
            :form-action="route('sms.gateways.test')"
    >
        <input type="hidden" name="gateway" value="" />

        <x-core::form.text-input
                :label="trans('plugins/sms::sms.test_modal.to')"
                :placeholder="trans('plugins/sms::sms.test_modal.to_placeholder')"
                type="tel"
                name="to"
        />

        <x-core::form.textarea
                :label="trans('plugins/sms::sms.test_modal.message')"
                name="message"
                value="This is a test message from {{ config('app.name') }}."
                required
        />

        <x-slot:footer>
            <x-core::button
                    type="button"
                    data-bs-dismiss="modal"
            >
                {{ trans('core/base::base.close') }}
            </x-core::button>
            <x-core::button
                    type="submit"
                    color="primary"
            >
                {{ trans('plugins/sms::sms.test_button') }}
            </x-core::button>
        </x-slot:footer>
    </x-core::modal>
@endpush
