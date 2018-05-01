<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeninfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geninf', function (Blueprint $table) {
            $table->increments('id');
            $table->string('100000001')->nullable();
            $table->string('100000002')->nullable();
            $table->string('100000003')->nullable();
            $table->string('100000004')->nullable();
            $table->string('100000005')->nullable();
            $table->string('100000006')->nullable();
            $table->string('100000007')->nullable();
            $table->string('100000008')->nullable();
            $table->string('100000009')->nullable();
            $table->string('100000010')->nullable();
            $table->string('100000011')->nullable();
            $table->string('100000012')->nullable();
            $table->string('100000013')->nullable();
            $table->string('100000014')->nullable();
            $table->string('100000015')->nullable();
            $table->string('100000016')->nullable();
            $table->string('100000017')->nullable();
            $table->string('100000018')->nullable();
            $table->string('100000019')->nullable();
            $table->string('100000020')->nullable();
            $table->string('100000021')->nullable();
            $table->string('100000022')->nullable();
            $table->string('100000023')->nullable();
            $table->string('100000024')->nullable();
            $table->string('100000025')->nullable();
            $table->string('100000026')->nullable();
            $table->string('100000027')->nullable();
            $table->string('100000028')->nullable();
            $table->string('100000029')->nullable();
            $table->string('100000030')->nullable();
            $table->string('100000031')->nullable();
            $table->string('100000032')->nullable();
            $table->string('100000033')->nullable();
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
        Schema::dropIfExists('geninf');
    }
}
