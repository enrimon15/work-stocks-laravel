<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('commercial_contact_id');
            $table->foreign('commercial_contact_id')->references('id')->on('commercial_contacts')->onDelete('cascade');
            $table->string('piva');
            $table->string('company_form');
            $table->string('name');
            $table->text('overview');
            $table->integer('employees_number');
            $table->year('foundation_year');
            $table->string('website');
            $table->string('slogan');
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
        Schema::dropIfExists('companies');
    }
}
