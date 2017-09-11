<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danswers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doing_id')->index();
            $table->integer('topic_id')->index();
            $table->string('your_answer')->nullable();
            $table->string('true_answer');
            $table->string('get_value')->default(0);
            $table->tinyInteger('status')->default(0)->index()->comment('o错解，1正解,3没选全');
            $table->string('topic_type')->index()->comment('试题类型');
            $table->integer('value')->unsigned()->default(0);
            $table->integer('unchecked')->unsigned()->default(0)->comment('漏选分值');
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
        Schema::dropIfExists('danswers');
    }
}
