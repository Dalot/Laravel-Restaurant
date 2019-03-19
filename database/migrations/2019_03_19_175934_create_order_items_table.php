<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->integer('food_id')->unsigned();
            $table->integer('drink_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('order_id')->unsigned();
            $table->decimal('price')->nullable();
            $table->integer('quantity')->unsigned()->default(1);
            
            $table->timestamps();
        });
        
        Schema::table('order_items', function($table) {
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' )->onUpdate( 'cascade' );
            $table->foreign( 'food_id' )->references( 'id' )->on( 'foods' );
            $table->foreign( 'drink_id' )->references( 'id' )->on( 'drinks' );
            $table->foreign( 'menu_id' )->references( 'id' )->on( 'menus' );
            $table->foreign( 'order_id' )->references( 'id' )->on( 'orders' );
        });
        
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('order_item_order');
    }
}
