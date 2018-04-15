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
            $table->integer('no_of_lectures')->nullable();
            // any previous knowledge 
            $table->text('pre_requisites')->nullable();
            $table->text('audience')->nullable();
            $table->text('expectations')->nullable();
            $table->text('summary')->nullable();
            $table->text('message')->nullable();
            $table->integer('duration')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
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
