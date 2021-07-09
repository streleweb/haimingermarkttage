<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsoren', function (Blueprint $table) {
            $table->id();
            $table->string('sponsor_brandname')->nullable();
            $table->string('sponsor_vorname')->nullable();
            $table->string('sponsor_nachname')->nullable();
            $table->string('sponsor_websiteurl')->nullable();
            $table->string('sponsor_logourl')->nullable();
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
        Schema::dropIfExists('sponsoren');
    }
}
