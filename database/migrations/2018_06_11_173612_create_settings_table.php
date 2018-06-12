<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('网站名称');
            $table->string('left')->comment('左侧地址');
            $table->string('lurl')->comment('左侧url');
            $table->string('center')->comment('中间地址');
            $table->string('curl')->comment('中间url');
            $table->string('right')->comment('右侧地址');
            $table->string('rurl')->comment('右侧url');
            $table->string('copyright')->comment('版权所有');
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
        Schema::dropIfExists('settings');
    }
}
