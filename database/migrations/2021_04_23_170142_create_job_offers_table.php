<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('place_of_work_id');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('place_of_work_id')->references('id')->on('places_of_works')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('experience');
            $table->date('due_date');
            $table->enum('offers_type',['full_time','part_time','construction_base','internship']);
            $table->enum('sex', ['male','female','not_specified']);
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
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
        Schema::dropIfExists('job_offers');
    }
}
