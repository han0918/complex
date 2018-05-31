<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddKeywordToCategroyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categroys', function (Blueprint $table) {
            $table->string('keyword')->coment('关键词');
            $table->string('content')->comment('关键词内容');
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
            $table->dropColumn('keyword');
            $table->dropColumn('content');
        });
    }
}
