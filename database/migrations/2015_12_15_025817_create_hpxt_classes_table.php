<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHpxtClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpxt_classes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('volunteer_id')->unsigned()->comment('志愿者');
            $table->foreign('volunteer_id')->references('id')->on('volunteers');

            $table->integer('scale_id')->unsigned()->comment('规模');
            $table->foreign('scale_id')->references('id')->on('hpxt_class_scales');

            $table->integer('mode_id')->unsigned()->comment('形式');
            $table->foreign('mode_id')->references('id')->on('hpxt_class_modes');

            $table->string('name', 31)->comment('班级名称');
            $table->date('time')->comment('班级招募时间');
            $table->boolean('state')->comment('班级状态-审核中/审核通过');

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
        Schema::table('hpxt_classes', function(Blueprint $table) {
            $table->dropForeign('hpxt_classes_volunteer_id_foreign');
            $table->dropForeign('hpxt_classes_scale_id_foreign');
            $table->dropForeign('hpxt_classes_mode_id_foreign');
        });
        Schema::drop('hpxt_classes');
    }
}
