<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activitys', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 31)->comment('项目标题');
            $table->text('abstract')->comment('项目摘要');
            $table->text('details')->comment('项目详情');

            $table->boolean('valid')->default(true)->comment('项目是否有效');

            $table->integer('unit_id')->unsigned()->comment('主办单位');
            $table->foreign('unit_id')->references('id')->on('units');

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
        Schema::table('activitys', function(Blueprint $table) {
            $table->dropForeign('unit_id');
        });
        Schema::drop('activitys');
    }
}
