<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexUrlToActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::table('activitys', function (Blueprint $table) {
            $table->string('index_url')->after('title')->comment('链接地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::table('activitys', function (Blueprint $table) {
            $table->dropColumn(['index_url']);
        });
    }
}
