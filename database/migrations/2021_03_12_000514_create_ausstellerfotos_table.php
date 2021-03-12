<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAusstellerfotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ausstellerfoto', function (Blueprint $table) {
            $table->id();
            $table->string('ausstellerfoto_name');
            $table->string('ausstellerfoto_url');
            $table->bigInteger('aussteller_id')->unsigned();
            $table->foreign('aussteller_id')->references('id')->on('aussteller');
            //$table->foreignId('aussteller_id')->constrained();
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ausstellerfoto');
    }
}
