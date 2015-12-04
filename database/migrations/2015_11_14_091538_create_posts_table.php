<?php

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
            $table->integer('cid');
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('content_raw');
            $table->text('content_html');
            $table->boolean('is_draft');
            $table->integer('vote_cache')->unsigned()->default(0);
            $table->integer('view_cache')->unsigned()->default(0);
            $table->string('first_imgurl');
            $table->timestamps();
            $table->timestamp('published_at')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
