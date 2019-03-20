<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkMenuPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_menu', function (Blueprint $table) {
            $table->integer('drink_id')->unsigned()->index();
            $table->integer('menu_id')->unsigned()->index();
            
            $table->primary(['drink_id', 'menu_id']);
        });
        
        Schema::table('drink_menu', function (Blueprint $table) {
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drink_menu');
    }
}
