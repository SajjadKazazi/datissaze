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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('acceptor_id')->nullable();
            $table->text('body');//text for usage in page
            $table->string('name',50)->nullable();
            $table->string('mobile')->nullable();//for guest
            $table->enum('status',\App\Enumoration\CommentStatus::status)->default(\App\Enumoration\CommentStatus::PENDING)->index();
            $table->boolean('admin')->default(false);
            $table->morphs('commentable');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamps();
//            $table->foreign('user_id')
//                ->references('id')
//                ->on('users');
//            $table->foreign('acceptor_id')
//                ->references('id')
//                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
