<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_deps', function (Blueprint $table) {
            $table->integer('course_id');
            $table->integer('no_of_lectures');
            $table->integer('duration');
            $table->string('category');
            $table->string('subcategory');
            $table->primary(['course_id']);
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
        Schema::dropIfExists('_course__deps_');
    }
}
