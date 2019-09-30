<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option', function (Blueprint $table) {
            $table->increments('id');
            $table->string('web_title', 70);
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('footer')->nullable();
            $table->text('map')->nullable();
            $table->text('keywords')->nullable();
            $table->string('copyright')->nullable();
            $table->string('fb_fanpage')->nullable();
            $table->text('fb_pixel')->nullable();
            $table->text('gg_anatylics')->nullable();
            $table->string('cdn_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('option');
    }
}
