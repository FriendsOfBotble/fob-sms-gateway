<?php

namespace FriendsOfBotble\Sms\Tables;

use Botble\Table\Abstracts\TableAbstract;
use Botble\Table\Actions\Action;
use Botble\Table\Actions\DeleteAction;
use Botble\Table\BulkActions\DeleteBulkAction;
use Botble\Table\Columns\Column;
use Botble\Table\Columns\FormattedColumn;
use Botble\Table\Columns\IdColumn;
use Botble\Table\Columns\StatusColumn;
use FriendsOfBotble\Sms\Facades\Sms;
use FriendsOfBotble\Sms\Models\SmsLog;

class SmsLogTable extends TableAbstract
{
    public function setup(): void
    {
        $this
            ->model(SmsLog::class)
            ->addColumns([
                IdColumn::make(),
                FormattedColumn::make('driver')
                    ->label(trans('plugins/sms::sms.logs.provider'))
                    ->getValueUsing(fn (FormattedColumn $column) => Sms::driver($column->getItem()->driver)->getName()),
                Column::make('from')
                    ->label(trans('plugins/sms::sms.logs.from')),
                Column::make('to')
                    ->label(trans('plugins/sms::sms.logs.to')),
                FormattedColumn::make('message')
                    ->label(trans('plugins/sms::sms.logs.message'))
                    ->limit(30),
                StatusColumn::make()
                    ->label(trans('plugins/sms::sms.logs.status')),
            ])
            ->addActions([
                Action::make('view')
                    ->label(trans('core/base::tables.view'))
                    ->icon('ti ti-eye')
                    ->route('sms.logs.show'),
                DeleteAction::make()->route('sms.logs.destroy'),
            ])
            ->addBulkAction(DeleteBulkAction::make());
    }
}
