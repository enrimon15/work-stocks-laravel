<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_components', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('home_id');
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
            $table->string('component_name');
            $table->string('component_title_it')->nullable();
            $table->string('component_title_en')->nullable();
            $table->string('component_subtitle_it')->nullable();
            $table->string('component_subtitle_en')->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('home_components');
    }
}
