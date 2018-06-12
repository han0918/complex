<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStateToCategroyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categroys', function (Blueprint $table) {
            $table->tinyInteger('state')->index()->default(0)->comment('1热门推荐');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categroys', function (Blueprint $table) {
            $table->dropColumn('state');
        });
    }
}
