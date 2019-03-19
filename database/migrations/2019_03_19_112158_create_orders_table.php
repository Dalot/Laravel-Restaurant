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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->decimal('price')->unsigned();
            $table->unsignedInteger('quantity')->default(1);
            $table->string('status')->default("In Progress");
            $table->unsignedInteger('delay')->nullable(); 
            $table->timestamps();
            $table->softDeletes();
        });
        

        
        Schema::table('orders', function($table) {
           $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'cascade' )->onUpdate( 'cascade' );

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
