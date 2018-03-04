<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->nullable();
            $table->string('tutor_id')->nullable();
            $table->string('level')->default('Beginner');
            $table->string('language')->default('English');
            $table->integer('price')->default(0);
            $table->string('title');
            $table->longText('description');
            $table->integer('total_lectures')->default(0);
            $table->integer('duration')->default(0);
            $table->string('photo')->nullable();
            $table->string('category')->nullable();
            $table->integer('rating')->default(0);            
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
        Schema::dropIfExists('courses');
    }
}
