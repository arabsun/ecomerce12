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
        Schema::create('blogs', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id', true);
            $table->string('title')->nullable();
            $table->string('slug', 250);
            $table->integer('category_id')->nullable();
            $table->text('details')->nullable();
            $table->integer('status')->nullable();
            $table->string('photo', 250)->nullable();
            $table->string('date', 250)->nullable();
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
        Schema::dropIfExists('blogs');
    }
};
