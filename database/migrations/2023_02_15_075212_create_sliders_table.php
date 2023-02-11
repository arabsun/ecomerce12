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
        Schema::create('sliders', function (Blueprint $table) {
            $table->comment('');
            $table->increments('id');
            $table->text('subtitle_text')->nullable();
            $table->text('title_text')->nullable();
            $table->text('details_text')->nullable();
            $table->string('photo', 191)->nullable();
            $table->string('position', 50)->nullable();
            $table->text('link')->nullable();
            $table->string('color', 19)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
};
