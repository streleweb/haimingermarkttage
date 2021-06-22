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
            $table->string('sponsor_brandname');
            $table->string('sponsor_vorname');
            $table->string('sponsor_nachname');
            $table->string('sponsor_websiteurl');
            $table->string('sponsor_logourl');
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
