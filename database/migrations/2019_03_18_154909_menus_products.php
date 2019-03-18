<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenusProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus_products', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->bigInteger('food_id')->unsigned();
            $table->decimal('price')->nullable();
            $table->timestamps();
            
        });
        
         Schema::table('menus_products', function($table) {
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
