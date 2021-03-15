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
            $table->string('aussteller_fullname');
            $table->string('aussteller_beschreibung')->nullable();
            $table->string('aussteller_brandingname')->nullable();
            $table->string('aussteller_email')->unique()->nullable();
            $table->string('aussteller_telefonnummer')->nullable();
            $table->string('aussteller_websiteurl')->nullable();
            $table->string('aussteller_zonenfarbe')->nullable();
            $table->string('aussteller_bildurl')->nullable();
            $table->integer('aussteller_jahre')->nullable();
            
            $table->string('aussteller_straße')->nullable();
            $table->integer('aussteller_postleitzahl')->nullable();
            $table->string('aussteller_wohnort')->nullable();
            

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