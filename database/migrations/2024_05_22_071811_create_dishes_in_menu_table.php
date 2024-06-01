<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesInMenuTable extends Migration
{
    public function up()
    {
        Schema::create('dishes_in_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('dish_id');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('dish_id')->references('id')->on('dishes')->onDelete('cascade');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('dishes_in_menu');
    }
}
