<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerBeansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_beans', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('volunteer_id')->unsigned()->comment('志愿者');
            $table->foreign('volunteer_id')->references('id')->on('volunteers');

            $table->integer('bean_rate_id')->unsigned()->comment('积分兑换规则');
            $table->foreign('bean_rate_id')->references('id')->on('activity_bean_rates');

            $table->boolean('valid')->default(false)->comment('积分是否有效');
            $table->timestamp('action_at')->comment('积分生成时间');
            $table->timestamp('valid_time')->comment('积分生效时间');

            $table->index('volunteer_id');

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
        Schema::table('volunteer_beans', function(Blueprint $table) {
            $table->dropForeign('volunteer_id');
            $table->dropForeign('bean_rate_id');
        });
        Schema::drop('volunteer_beans');
    }
}
