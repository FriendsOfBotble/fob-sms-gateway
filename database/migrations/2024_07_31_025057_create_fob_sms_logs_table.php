<?php

use FriendsOfBotble\Sms\Enums\SmsStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('fob_sms_logs', function (Blueprint $table) {
            $table->id();
            $table->string('driver');
            $table->string('message_id')->nullable();
            $table->string('to');
            $table->string('from');
            $table->text('message');
            $table->string('status', 50)->default(SmsStatus::PENDING);
            $table->text('response')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fob_sms_logs');
    }
};
