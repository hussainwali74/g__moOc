<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyLectureCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_lecture_comment', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('comment_id');
            $table->integer('lecture_id');
            $table->string('reply');
            $table->primary(['user_id','comment_id']);
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
        Schema::dropIfExists('reply_lecture_comment');
    }
}
