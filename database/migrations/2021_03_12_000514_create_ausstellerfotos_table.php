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
        Schema::create('ausstellerfotos', function (Blueprint $table) {
            $table->id();
            $table->string('ausstellerfoto_name');
            $table->string('ausstellerfoto_url');

            $table->foreignId('aussteller_id')->constrained();
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
        Schema::dropIfExists('ausstellerfotos');
    }
}
