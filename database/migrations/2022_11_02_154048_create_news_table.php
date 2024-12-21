<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('creator_id')->index();
            $table->string('title');
            $table->string('description');
            $table->text('body');
            $table->string('slug');
            $table->string('page_image');

            $table->boolean('active')->default(true);
            $table->string('thumbnail')->nullable();
            $table->timestamps();

        });
        Schema::create('category_news', function (Blueprint $table) {
            $table->integer('category_id')->unsigned();
            $table->integer('news_id')->unsigned();
//            $table->primary(['category_id', 'news_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
