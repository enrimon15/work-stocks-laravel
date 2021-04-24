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
            $table->unsignedBigInteger('commercial_contact_id');
            $table->unsignedBigInteger('companies_id');
            $table->unsignedBigInteger('places_of_work_id');
            //$table->unsignedBigInteger('sector');
            $table->foreign('commercial_contact_id')->references('id')->on('commercial_contacts')->onDelete('cascade');
            $table->foreign('companies_id')->references('id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('places_of_work_id')->references('id')->on('places_of_works')->onDelete('cascade');
            //$table->foreign('sector')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->integer('experience');
            $table->dateTime('due_date');
            $table->enum('offers_type',['full_time','part_time','costruction_base','internship']);
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
