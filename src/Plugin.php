<?php

namespace FriendsOfBotble\Sms;

use Botble\PluginManagement\Abstracts\PluginOperationAbstract;
use Botble\Setting\Facades\Setting;
use FriendsOfBotble\Sms\Facades\Guard;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Plugin extends PluginOperationAbstract
{
    public static function removed(): void
    {
        Schema::dropIfExists('fob_otps');

        $table = Guard::getTable();

        if (Schema::hasColumn($table, 'phone')) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn('phone_verified_at');
            });
        }

        Setting::newQuery()
            ->where('key', 'LIKE', 'fob_otp_%')
            ->delete();

        Setting::newQuery()
            ->where('key', 'LIKE', 'fob_sms_%')
            ->delete();
    }
}
