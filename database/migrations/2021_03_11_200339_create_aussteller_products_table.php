<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAusstellerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aussteller_product', function (Blueprint $table) {

            $table->foreignId('aussteller_id')->constrained();
            $table->foreignId('product_id')->constrained();
            //$table->id();
            /*$table->bigIncrements('id');
            $table->string('aussteller_id'); //wenn nötig noch als index hinzufügen
            $table->foreign('aussteller_id')
                    ->references('id')
                    ->on('aussteller');

            $table->string('product_id');
            $table->foreign('product_id')
                    ->references('id')
                    ->on('product');*/
            

            //$table->timestamps()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aussteller_products');
    }
}
