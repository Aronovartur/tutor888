<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('lesson_id');
            $table->enum('content_type',['video','article'])->default('video');
            $table->string('video_provider')->nullable();
            $table->integer('video_duration')->nullable();
            $table->string('video_filename')->nullable();
            $table->string('video_path')->nullable();
            $table->enum('video_storage', ['s3', 'local'])->nullable();
            $table->enum('video_src', ['upload', 'embed'])->nullable();
            $table->text('article_body')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
