<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('province_id')->unsigned()->comment('省ID');
            $table->string('province', 31)->comment('省');

            $table->integer('city_id')->unsigned()->comment('市ID');
            $table->string('city', 31)->comment('市');

            $table->integer('country_id')->unsigned()->comment('区ID');
            $table->string('country', 31)->comment('区');

            $table->integer('hospital_id')->unsigned()->comment('省ID');
            $table->string('hospital', 31)->comment('省');

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
        Schema::drop('hospitals');
    }
}
