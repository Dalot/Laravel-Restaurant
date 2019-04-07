<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Categorizables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('categorizables', function (Blueprint $table) {
            $table->primary(['category_id', 'categorizable_id', 'categorizable_type'], 'categorizables_primary');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('categorizable_id');
            $table->string('categorizable_type');
            
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
