<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyCourseCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_course_comment', function (Blueprint $table) {
            $table->integer('lecture_id');
            $table->integer('user_id');
            $table->integer('comment_id');
            $table->Text('reply');
            $table->primary(['comment_id','user_id']);
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
        Schema::dropIfExists('reply_course_comment');
    }
}
