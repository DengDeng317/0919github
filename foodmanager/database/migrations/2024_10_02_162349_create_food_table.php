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
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('price')->nullable();
            $table->string('storage_location')->nullable();
            $table->date('purchase_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('label_id')->nullable()->comment('標籤ID');
            $table->unsignedBigInteger('food_category_id')->nullable()->comment('類別ID');
            $table->unsignedBigInteger('user_id')->nullable()->comment('用戶ID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foods');
    }
};
