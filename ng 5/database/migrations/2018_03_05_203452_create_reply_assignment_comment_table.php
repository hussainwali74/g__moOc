<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyAssignmentCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_assignment_comment', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('comment_id');
            $table->integer('assignment_id');
            $table->string('reply');
            $table->primary(['assignment_id','user_id']);
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
        Schema::dropIfExists('reply_assignment_comment');
    }
}
