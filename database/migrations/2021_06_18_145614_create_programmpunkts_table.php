<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgrammpunktsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmpunkt', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('programm_id')->unsigned();
            $table->string('programmpunkt_titel')->nullable();
            $table->string('programmpunkt_beschreibung')->nullable();
            $table->foreign('programm_id')->references('id')->on('programm')->onDelete('cascade');
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
        Schema::dropIfExists('programmpunkt');
    }
}
