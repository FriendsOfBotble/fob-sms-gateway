<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('fob_otps', function (Blueprint $table) {
            $table->id();
            $table->string('identifier');
            $table->string('token', 10);
            $table->integer('validity');
            $table->timestamp('generated_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fob_otps');
    }
};
