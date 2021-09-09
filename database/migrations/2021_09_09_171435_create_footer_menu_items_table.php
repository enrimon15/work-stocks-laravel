<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFooterMenuItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_menu_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('footer_menu_id');
            $table->foreign('footer_menu_id')->references('id')->on('footer_menus')->onDelete('cascade');
            $table->string("title_it")->nullable(false);
            $table->string("title_en")->nullable(false);
            $table->text("body")->nullable(false);
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
        Schema::dropIfExists('footer_menu_items');
    }
}
