<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddActionChsToActivityBeanRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_bean_rates', function (Blueprint $table) {
            $table->string('action_chs')->after('action')->comment('操作中文名');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_bean_rates', function (Blueprint $table) {
            $table->dropColumn(['action_chs']);
        });
    }
}
