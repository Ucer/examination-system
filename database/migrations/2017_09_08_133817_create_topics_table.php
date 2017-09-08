<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('type')->index()->comment('radio,multiselect,select(不定向),field,judge,ask,materail');
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->tinyInteger('level')->default(0)->index()->comment('0简单，1一般，2困难');
            $table->text('answer')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('topics');
    }
}
