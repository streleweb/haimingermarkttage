<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     * Alphabetisch geordnet, damit eloquent Magic funkt.
     * @return void
     */
    public function up() //role
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id(); //Hier dann $table->index('aussteller_id'); & $table->foreign('user_id')->references('id')->on('users')      falls wo notwendig  ->onDelete('cascade'); 
           // $table->bigIncrements('id');
            $table->string('product_name');
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
        Schema::dropIfExists('product');
    }
}
