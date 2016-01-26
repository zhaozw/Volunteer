<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirclassroomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('airclassroom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32)->nullable();
            $table->string('phone', 11)->nullable();
            $table->string('password', 11)->nullable();
            $table->string('course_type', 32)->nullable();
            $table->string('province', 20)->nullable();
            $table->string('city', 20)->nullable();
            $table->string('country', 20)->nullable();
            $table->string('hospital', 20)->nullable();
            $table->string('department', 6)->nullable();
            $table->string('title', 12)->nullable();
            $table->string('mail', 64)->nullable();
            $table->string('oicq', 20)->nullable();
            $table->string('openid', 64)->nullable();
            $table->integer('status')->nullable();
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
        //
        Schema::drop('airclassroom');
    }
}
