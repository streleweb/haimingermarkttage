<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAusstellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('aussteller', function (Blueprint $table) {
            $table->id();
            //$table->bigInteger('id');
            $table->string('aussteller_fullname')->unique();
            $table->string('aussteller_beschreibung')->nullable();
            $table->string('aussteller_brandingname')->nullable();
            $table->string('aussteller_email')->unique()->nullable();
            $table->string('aussteller_websiteurl')->unique()->nullable();
            $table->string('aussteller_zonenfarbe')->unique()->nullable();
            $table->string('aussteller_bildurl')->nullable();
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
        Schema::dropIfExists('aussteller');
    }
}
