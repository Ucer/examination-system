<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->text('description')->nullable();
            $table->integer('user_id')->unsigned()->default(0)->index();
            $table->integer('percentag')->unsigned()->default(0)->index()->comment('简单题目比');
            $table->integer('percentag1')->unsigned()->default(0)->index()->comment('一般题目比');
            $table->integer('percentag2')->unsigned()->default(0)->index()->comment('困难题目比');
            $table->integer('limit_time')->unsigned()->default(0)->index()->comment('单位-分钟');
            $table->integer('topic_count')->default(0);
            $table->integer('value_count')->default(0);
            $table->tinyInteger('generate_type')->default(0)->index()->comment('0随机，1难易');
            $table->tinyInteger('status')->default(0)->index()->comment('0未发布，1已发布');
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
        Schema::dropIfExists('papers');
    }
}
