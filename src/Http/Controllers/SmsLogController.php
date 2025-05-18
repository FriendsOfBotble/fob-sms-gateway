<?php

namespace FriendsOfBotble\Sms\Http\Controllers;

use Botble\Base\Http\Actions\DeleteResourceAction;
use Botble\Base\Http\Controllers\BaseController;
use Botble\Base\Supports\Breadcrumb;
use FriendsOfBotble\Sms\Models\SmsLog;
use FriendsOfBotble\Sms\Tables\SmsLogTable;

class SmsLogController extends BaseController
{
    protected function breadcrumb(): Breadcrumb
    {
        return parent::breadcrumb()->add(trans('plugins/fob-sms-gateway::sms.logs.title'), route('sms.logs.index'));
    }

    public function index(SmsLogTable $smsLogTable)
    {
        $this->pageTitle(trans('plugins/fob-sms-gateway::sms.logs.title'));

        return $smsLogTable->renderTable();
    }

    public function show(string $id)
    {
        $this->pageTitle(trans('plugins/fob-sms-gateway::sms.logs.detail_title', ['id' => $id]));

        $smsLog = SmsLog::query()->findOrFail($id);

        return view('plugins/fob-sms-gateway::logs.show', compact('smsLog'));
    }

    public function destroy(string $id)
    {
        $smsLog = SmsLog::query()->findOrFail($id);

        return DeleteResourceAction::make($smsLog);
    }
}
