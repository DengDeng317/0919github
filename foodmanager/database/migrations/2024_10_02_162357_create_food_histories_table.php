<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food_histories', function (Blueprint $table) {
            $table->id();
            $table->date('action_date');
            $table->string('action_type');
            $table->unsignedBigInteger('food_id')->nullable()->comment('外鍵，參考食物ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_histories');
    }
};
