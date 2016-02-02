<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name', 31)->comment('名字');
            $table->string('phone', 11)->comment('电话');
            $table->string('email', 31)->comment('邮箱');

            $table->string('openid')->comment('wechat volunteer open id');
            $table->string('nickname')->nullable()->comment('wechat volunteer nick name');
            $table->string('headimgurl')->nullable()->comment('wechat volunteer headimgurl');

            $table->integer('unit_id')->unsigned()->comment('单位ID');
            $table->foreign('unit_id')->references('id')->on('units');

            $table->unsignedInteger('beans_total')->default(0)->comment('迈豆总额');
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
        Schema::table('volunteers', function(Blueprint $table) {
            $table->dropForeign('volunteers_unit_id_foreign');
        });
        Schema::drop('volunteers');
    }

} /*class*/
