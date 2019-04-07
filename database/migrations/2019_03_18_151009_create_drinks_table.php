<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->decimal('price_drink')->nullable();
            $table->text('description')->nullable();
            $table->string('url_image')->nullable();
            $table->enum('time', array('Recess', 'Lunch', 'Dinner'))->nullable();
            $table->string('type')->default("drink");
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
        Schema::dropIfExists('drinks');
    }
}
