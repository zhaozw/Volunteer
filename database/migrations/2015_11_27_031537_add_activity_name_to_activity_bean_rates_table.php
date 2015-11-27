<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityNameToActivityBeanRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_bean_rates', function (Blueprint $table) {
            $table->string('activity_name', 31)->after('activity_id')->comment('项目名称');
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
            $table->dropColumn(['activity_name']);
        });
    }
}
