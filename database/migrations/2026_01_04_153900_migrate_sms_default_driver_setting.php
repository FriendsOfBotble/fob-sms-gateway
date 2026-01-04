<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class () extends Migration {
    public function up(): void
    {
        $oldSetting = DB::table('settings')
            ->where('key', 'sms_default_driver')
            ->first();

        if ($oldSetting) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'fob_sms_default_driver'],
                ['value' => $oldSetting->value]
            );

            DB::table('settings')
                ->where('key', 'sms_default_driver')
                ->delete();
        }
    }

    public function down(): void
    {
        $newSetting = DB::table('settings')
            ->where('key', 'fob_sms_default_driver')
            ->first();

        if ($newSetting) {
            DB::table('settings')->updateOrInsert(
                ['key' => 'sms_default_driver'],
                ['value' => $newSetting->value]
            );

            DB::table('settings')
                ->where('key', 'fob_sms_default_driver')
                ->delete();
        }
    }
};
