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
        Schema::create('staff_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->boolean('active')->default(true);

            $table->text('description')->nullable();

            $table->timestamps();
        });

        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->index();
            $table->string('name');
            $table->string('job');
            $table->string('avatar');
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('staff');
        Schema::dropIfExists('staff_socials');
    }
};
