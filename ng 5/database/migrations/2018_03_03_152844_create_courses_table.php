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
            $table->string('tutor_id')->nullable();
            $table->enum('level',['Beginner','Intermediate', 'Expert','All'])->default('Beginner');
            $table->enum('language',['English','Urdu'])->default('English');
            
            $table->integer('price')->default(0);
            $table->string('title');
            $table->longText('description');
            $table->string('photo')->nullable();
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
