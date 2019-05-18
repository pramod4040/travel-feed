<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('profile_image')->nullable();

            $table->tinyInteger('pilgrims')->nullable();
            $table->unsignedInteger('pilgrims_like')->default(0);

            $table->tinyInteger('foodie')->nullable();
            $table->unsignedInteger('foodie_like')->default(0);

            $table->tinyInteger('adventure')->nullable();
            $table->unsignedInteger('adventure_like')->default(0);

            $table->tinyInteger('water_body')->nullable();
            $table->unsignedInteger('waterbody_like')->default(0);

            $table->tinyInteger('nature_seeing')->nullable();
            $table->unsignedInteger('natureseeing_like')->default(0);

            $table->tinyInteger('ancient')->nullable();
            $table->unsignedInteger('ancient_like')->default(0);

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
        Schema::dropIfExists('userprofiles');
    }
}
