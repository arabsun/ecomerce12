<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->unsignedInteger('default')->default(0)->comment('1 => default, 0 => not default');
            $table->string('symbol')->unique();
            $table->string('code')->unique();
            $table->string('curr_name');
            $table->unsignedInteger('type')->comment('1 => fiat, 2 => crypto');
            $table->unsignedInteger('status')->comment('1 => active, 0 => inactive');
            $table->unsignedDecimal('rate', 20, 10);
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
        Schema::dropIfExists('currencies');
    }
};
