<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'post_tag_post_idx');
            $table->foreign('post_id', 'post_tag_post_fk')
                ->on('posts')
                ->references('id')
                ->onDelete('cascade');

            $table->unsignedBigInteger('tag_id');
            $table->index('tag_id', 'tag_post_tag_idx');
            $table->foreign('tag_id', 'tag_post_tag_fk')->on('tags')->references('id');

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
        Schema::dropIfExists('post_tag');
    }
}
