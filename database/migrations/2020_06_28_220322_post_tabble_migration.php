<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostTabbleMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->string('url');
            $table->integer('author_id');
            $table->integer('category_id');
            $table->String('seo_title')->nullable();
            $table->longText('body')->nullable();
            $table->String('image')->nullable();
            $table->String('meta_description')->nullable();
            $table->String('meta_keyword')->nullable();
            $table->String('status');
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
        Schema::dropIfExists('post');
    }
}
