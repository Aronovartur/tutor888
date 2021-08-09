<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('user_id');
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('language');
            $table->string('image');
            $table->enum('level', ['Beginner', 'Intermediate', 'Advanced']);
            $table->boolean('featured')->default(false);
            $table->boolean('approved')->default(false);
            $table->integer('price');
            $table->boolean('active');
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
