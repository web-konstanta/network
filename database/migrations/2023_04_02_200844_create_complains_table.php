<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->index('user_id', 'user_complain_idx');
            $table->foreign('user_id', 'user_complain_fk')
                ->on('users')
                ->references('id')
                ->onDelete('cascade');

            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'post_complain_idx');
            $table->foreign('post_id', 'post_complain_fk')->on('posts')->references('id');

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
        Schema::dropIfExists('complains');
    }
}
