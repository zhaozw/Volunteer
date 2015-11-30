<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 31)->comment('名字');
            $table->string('phone', 31)->comment('手机号码');
            $table->string('email', 127)->comment('电子邮件');

            $table->integer('hospital_id')->unsigned()->comment('医院ID');
            $table->foreign('hospital_id')->references('id')->on('doctor_hospitals');

            $table->integer('office_id')->unsigned()->comment('科室ID');
            $table->foreign('office_id')->references('id')->on('doctor_offices');

            $table->integer('title_id')->unsigned()->comment('职称ID');
            $table->foreign('title_id')->references('id')->on('doctor_titles');


            $table->unique('phone');
            $table->index('phone');

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
        Schema::table('doctors', function (Blueprint $table) {
            //
            $table->dropForeign('doctors_hospital_id_foreign');
            $table->dropForeign('doctors_office_id_foreign');
            $table->dropForeign('doctors_title_id_foreign');
        });

        Schema::drop('doctors');
    }
}
