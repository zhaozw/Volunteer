<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteerDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteer_doctors', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('volunteer_id')->unsigned()->comment('志愿者');
            $table->foreign('volunteer_id')->references('id')->on('volunteers');

            $table->integer('doctor_id')->unsigned()->comment('医师');
            $table->foreign('doctor_id')->references('id')->on('doctors');

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
        Schema::table('volunteer_doctors', function (Blueprint $table) {
            //
            $table->dropForeign('volunteer_doctors_volunteer_id_foreign');
            $table->dropForeign('volunteer_doctors_doctor_id_foreign');
        });

        Schema::drop('volunteer_doctors');
    }
}
