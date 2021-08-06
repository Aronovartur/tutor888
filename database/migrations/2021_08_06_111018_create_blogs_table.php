<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('blog_category_id');
            $table->string('lang')->default('en');
            $table->string('title');
            $table->string('slug');
            $table->text('body');
            $table->boolean('published');
            $table->enum('type',['page','article'])->default('article');
            $table->boolean('display_main_menu')->default(true);
            $table->boolean('display_footer')->default(false);
            $table->boolean('featured_frontend')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
