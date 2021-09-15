<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAusstellerProduktreiterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aussteller_produktreiter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aussteller_id');
            $table->unsignedBigInteger('produktreiter_id');
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
        Schema::dropIfExists('aussteller_produktreiter');
    }
}
