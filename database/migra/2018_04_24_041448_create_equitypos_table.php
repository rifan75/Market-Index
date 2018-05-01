<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquityposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equitypos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('symbol');
            $table->string('period');
            $table->string('a');
            $table->string('b');
            $table->string('d');
            $table->string('e');
            $table->string('f');
            $table->string('g');
            $table->string('h');
            $table->string('i');
            $table->string('j');
            $table->string('k');
            $table->string('l');
            $table->string('m');
            $table->string('n');
            $table->string('o');
            $table->string('p');
            $table->string('q');
            $table->string('r');
            $table->string('s');
            $table->string('t');
            $table->string('u');
            $table->string('v');
            $table->string('w');
            $table->string('x');
            $table->string('y');
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
        Schema::dropIfExists('equitypos');
    }
}
