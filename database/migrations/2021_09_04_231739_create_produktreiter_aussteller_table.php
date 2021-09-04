<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduktreiterAusstellerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produktreiter_aussteller', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produktreiter_id');
            $table->unsignedBigInteger('aussteller_id');
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
        Schema::dropIfExists('produktreiter_aussteller');
    }
}
