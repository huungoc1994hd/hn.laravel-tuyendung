<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('title_seo')->nullable();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->unsignedInteger('author_id');
            $table->tinyInteger('status')->nullable();
            $table->string('target', 20)->default('_self');
            $table->string('url')->nullable();
            $table->text('tags')->nullable();
            $table->text('keywords')->nullable();
            $table->integer('order')->default(0);
            $table->integer('view_count')->default(0);
            $table->unsignedInteger('cate_id');
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
        Schema::dropIfExists('posts');
    }
}
