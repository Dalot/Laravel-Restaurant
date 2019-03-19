<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->BigInteger('food_id')->unsigned()->nullable();
            $table->BigInteger('drink_id')->unsigned()->nullable();
            $table->integer('menu_id')->unsigned()->nullable();
            $table->BigInteger('user_id')->unsigned();
            $table->decimal('price')->unsigned();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('status')->default("In Progress");
            $table->unsignedInteger('delay')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
        

        
        Schema::table('orders', function($table) {
           $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' )->onUpdate( 'cascade' );
           $table->foreign( 'food_id' )->references( 'id' )->on( 'foods' );
           $table->foreign( 'drink_id' )->references( 'id' )->on( 'drinks' );
           $table->foreign( 'menu_id' )->references( 'id' )->on( 'menus' );
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
