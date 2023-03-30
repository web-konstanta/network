<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'comment_post_idx');
            $table->foreign('post_id', 'comment_post_fk')->on('posts')->references('id');

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'comment_user_idx');
            $table->foreign('user_id', 'comment_user_fk')->on('users')->references('id');

            $table->string('text');

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
        Schema::dropIfExists('comments');
    }
}
