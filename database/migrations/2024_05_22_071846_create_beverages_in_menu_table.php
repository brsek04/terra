<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeveragesInMenuTable extends Migration
{
    public function up()
    {
        Schema::create('beverages_in_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('beverage_id');
            $table->foreign('menu_id')->references('id')->on('menus');
            $table->foreign('beverage_id')->references('id')->on('beverages');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('beverages_in_menu');
    }
}
