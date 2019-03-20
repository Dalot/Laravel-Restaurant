<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orderables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderables', function (Blueprint $table) {
            $table->primary(['user_id', 'order_id', 'orderable_id', 'orderable_type']);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('orderable_id');

            $table->string('orderable_type');
            
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
        //
    }
}
