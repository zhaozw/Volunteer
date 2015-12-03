<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIconUrlToActivitysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activitys', function (Blueprint $table) {
            $table->string('icon_url')->after('title')->comment('图标链接地址');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activitys', function (Blueprint $table) {
            $table->dropColumn(['icon_url']);
        });
    }
}
