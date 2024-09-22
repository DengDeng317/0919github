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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('main_cate_id')->nullable();
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('name')->comment('紀錄名稱')->nullable();
            $table->date('exp_date')->comment('保存期限');
            $table->string('img')->comment('圖片')->nullable();
            $table->string('place')->comment('存放位置')->nullable();
            $table->integer('price')->comment('金額')->nullable();
            $table->integer('amount')->comment('數量')->nullable();
            $table->text('remark')->comment('備註')->nullable();
            $table->integer('del_state')->default(0)->comment('刪除狀態');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
