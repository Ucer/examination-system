<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subpapers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('paper_id')->unsigned()->default(0)->index();
            $table->integer('topic_id')->unsigned()->default(0)->index();
            $table->integer('value')->unsigned()->default(0);
            $table->integer('unchecked')->unsigned()->default(0)->comment('漏选分值');
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
        Schema::dropIfExists('subpapers');
    }
}
