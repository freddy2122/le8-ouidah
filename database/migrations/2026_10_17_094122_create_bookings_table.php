<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->string('locale', 2)->default('fr');

            $table->string('tent_slug');
            $table->string('tent_name');
            $table->unsignedInteger('price_per_night_xof');

            $table->date('check_in');
            $table->date('check_out');
            $table->unsignedSmallInteger('nights');
            $table->unsignedTinyInteger('guests');

            $table->unsignedInteger('total_xof');
            $table->unsignedTinyInteger('deposit_percent')->default(50);
            $table->unsignedInteger('deposit_xof');
            $table->unsignedInteger('balance_xof');

            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone');

            $table->string('status')->default('pending_deposit');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
