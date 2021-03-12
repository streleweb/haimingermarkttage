<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotogaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fotogalerie', function (Blueprint $table) {
            $table->id();
            $table->string('fotogalerie_fotoname')->nullable();
            $table->string('fotogalerie_fotobeschreibung')->nullable();
            $table->string('fotogalerie_fotourl');
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
        Schema::dropIfExists('fotogalerie');
    }
}
