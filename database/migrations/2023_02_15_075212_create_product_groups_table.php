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
        Schema::create('product_groups', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id', true);
            $table->string('name', 90)->nullable();
            $table->string('slug', 250)->nullable();
            $table->integer('parent_id')->nullable();
            $table->string('photo', 90)->nullable();
            $table->string('meta_title', 300)->nullable();
            $table->text('meta_description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->text('description')->nullable();
            $table->enum('type', ['cat', 'sub', 'child'])->nullable();
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
        Schema::dropIfExists('product_groups');
    }
};
