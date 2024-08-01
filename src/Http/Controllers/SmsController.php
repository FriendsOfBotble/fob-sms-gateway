<?php

namespace FriendsOfBotble\Sms\Http\Controllers;

use Botble\Base\Facades\Assets;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Setting\Http\Controllers\Concerns\InteractsWithSettings;
use FriendsOfBotble\Sms\Facades\Guard;
use FriendsOfBotble\Sms\Facades\Sms;
use FriendsOfBotble\Sms\Forms\SmsSettingForm;
use FriendsOfBotble\Sms\Http\Requests\SmsSettingRequest;
use FriendsOfBotble\Sms\Http\Requests\SmsTestRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SmsController extends BaseController
{
    use InteractsWithSettings;

    public function index(): View
    {
        $this->pageTitle(trans('plugins/sms::sms.name'));

        Assets::addScriptsDirectly('vendor/core/plugins/sms/js/sms.js');

        $form = SmsSettingForm::create();

        return view('plugins/sms::index', compact('form'));
    }

    public function update(SmsSettingRequest $request)
    {
        $response = $this->performUpdate($request->validated());

        $table = Guard::getTable($request->input('fob_otp_guard'));
        $column = 'phone_verified_at';

        if (Schema::hasColumn($table, 'phone') && ! Schema::hasColumn($table, $column)) {
            Schema::table($table, function (Blueprint $table) use ($column) {
                $table->timestamp($column)->nullable()->after('phone');
            });
        }

        return $response;
    }

    public function updateGateway(string $driver, Request $request)
    {
        $gateways = array_keys(Sms::getProviders(activated: true));

        if (! in_array($driver, $gateways)) {
            abort(404);
        }

        $this->saveSettings(
            $request->all(),
            "fob_sms_{$driver}_"
        );

        return $this
            ->httpResponse()
            ->withUpdatedSuccessMessage();
    }

    public function changeStatus(string $driver)
    {
        $gateways = array_keys(Sms::getProviders());

        if (! in_array($driver, $gateways)) {
            abort(404);
        }

        $status = ! Sms::driver($driver)->isEnabled();

        $this->saveSettings([
            "{$driver}_enabled" => $status,
        ], 'fob_sms_');

        return $this
            ->httpResponse()
            ->setData(['activated' => $status])
            ->withUpdatedSuccessMessage();
    }

    public function test(SmsTestRequest $request)
    {
        $sms = Sms::driver($request->input('gateway'))->send(
            $request->input('to'),
            $request->input('message')
        );

        if (! $sms) {
            return $this
                ->httpResponse()
                ->setError()
                ->setMessage(trans('plugins/sms::sms.send_sms_failed'));
        }

        return $this
            ->httpResponse()
            ->setMessage(trans('plugins/sms::sms.sms_sent'));
    }
}
