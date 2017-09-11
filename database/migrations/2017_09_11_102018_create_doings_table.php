<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('paper_id')->index();
            $table->tinyInteger('status')->default(0)->index()->comment('0考试中，1暂停 ，2已交卷, 3已完成[阅卷完成]');
            $table->integer('oprated_at')->default(0)->index()->comment('考生最后一次操作时间,时间戳类型');
            $table->integer('surplus_time')->default(0)->index()->comment('剩余时间,时间戳类型');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doings');
    }
}
