<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityBeanRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_bean_rates', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('activity_id')->unsigned()->comment('关联项目');
            $table->foreign('activity_id')->references('id')->on('activitys');

            $table->string('action', 31)->comment('操作');
            $table->integer('rate')->unsigned()->comment('操作兑换积分');

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
        Schema::table('activity_bean_rates', function(Blueprint $table) {
            $table->dropForeign('activity_bean_rates_activity_id_foreign');
        });
        Schema::drop('activity_bean_rates');
    }
}
