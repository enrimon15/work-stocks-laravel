<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('job_title')->nullable();
            $table->string('overview')->nullable();
            $table->string('telephone')->nullable();
            $table->string('website')->nullable();
            $table->integer('min_salary')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('cv_path')->nullable();
            $table->date('birth')->nullable();
            $table->enum('sex', ['M', 'F'])->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
