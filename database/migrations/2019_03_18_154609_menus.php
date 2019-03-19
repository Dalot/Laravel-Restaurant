<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Menus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price_person')->nullable();
            $table->integer('food_id')->unsigned()->nullable();
            $table->integer('drink_id')->unsigned()->nullable();
            $table->integer('category_id')->unsigned();
            $table->boolean('available')->default(true);
            $table->timestamps();
        });
        
        Schema::table('menus', function($table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
