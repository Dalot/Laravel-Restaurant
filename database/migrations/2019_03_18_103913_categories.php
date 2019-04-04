<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->onDelete('cascade');
            $table->integer('depth')->default(0);
            $table->integer('parent_id')->default(0)->nullable();
            $table->enum('time',['Recess', 'Lunch', 'Dinner'])->nullable();
            $table->integer('lft')->default(0);
            $table->integer('rgt')->default(0);
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('url_image')->nullable();
            
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
