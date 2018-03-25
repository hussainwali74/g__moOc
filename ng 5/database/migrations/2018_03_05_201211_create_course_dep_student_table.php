<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseDepStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_dep_student', function (Blueprint $table) {
            $table->integer('course_id');
            $table->integer('student_id');
            $table->integer('rating');
            $table->integer('comment_id');
            $table->integer('student_progress');
            $table->boolean('active');
            $table->primary(['course_id','student_id']);
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
        Schema::dropIfExists('course_dep_student');
    }
}
