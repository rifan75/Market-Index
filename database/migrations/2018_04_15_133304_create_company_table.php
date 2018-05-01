<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
          $table->increments('id');
          $table->string('id_marketindex');
          $table->string('symbol');
          $table->string('name');
          $table->string('address')->nullable();
          $table->string('state')->nullable();
          $table->string('province')->nullable();
          $table->string('district')->nullable();
          $table->string('poscode')->nullable();
          $table->string('weburl')->nullable();
          $table->string('note')->nullable();
          $table->string('user_id');
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
        Schema::dropIfExists('company');
    }
}
