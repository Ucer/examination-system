<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stopics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned()->default(0)->index();
            $table->tinyInteger('name')->default(0)->index();
            $table->string('description')->default('请填写选项描述');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stopics');
    }
}
