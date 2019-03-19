<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_product', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned()->index();
            $table->bigInteger('product_id')->unsigned()->index();
            $table->primary(['menu_id', 'product_id']);
        });
        
        Schema::table('menu_product', function($table) {
           $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
           $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_product');
    }
}
