<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatprolossTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statproloss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('symbol');
            $table->string('period');
            $table->string('310000001');
            $table->string('310000002');
            $table->string('310000003');
            $table->string('310000004');
            $table->string('310000005');
            $table->string('310000006');
            $table->string('310000007');
            $table->string('310000008');
            $table->string('310000009');
            $table->string('310000010');
            $table->string('310000011');
            $table->string('310000012');
            $table->string('310000013');
            $table->string('310000014');
            $table->string('310000015');
            $table->string('310000016');
            $table->string('310000017');
            $table->string('310000018');
            $table->string('310000019');
            $table->string('311000000');
            $table->string('311010000');
            $table->string('311010100');
            $table->string('311010200');
            $table->string('311010300');
            $table->string('311010001');
            $table->string('311020000');
            $table->string('311020100');
            $table->string('311020200');
            $table->string('311020300');
            $table->string('311020400');
            $table->string('311020500');
            $table->string('311020600');
            $table->string('311020700');
            $table->string('311020800');
            $table->string('311020900');
            $table->string('311021000');
            $table->string('311021100');
            $table->string('311021200');
            $table->string('311020001');
            $table->string('311000001');
            $table->string('312000000');
            $table->string('313000000');
            $table->string('314000000');
            $table->string('315000000');
            $table->string('315010000');
            $table->string('315020000');
            $table->string('316000000');
            $table->string('316010000');
            $table->string('316020000');
            $table->string('317000000');
            $table->string('317010000');
            $table->string('317010100');
            $table->string('317010200');
            $table->string('317020000');
            $table->string('317020100');
            $table->string('317020200');
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
        Schema::dropIfExists('statproloss');
    }
}
