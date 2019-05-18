<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('userprofile_id')->nullable();
            $table->foreign('userprofile_id')->references('id')->on('userprofiles')->onDelete('cascade');

            $table->string('image')->nullable();
            $table->string('category_type')->nullable();
            $table->text('tags')->nullable();
            $table->unsignedInteger('destination_id')->nullable();
            $table->text('description')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
