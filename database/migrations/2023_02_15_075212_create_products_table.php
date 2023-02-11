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
        Schema::create('products', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->string('name', 200)->nullable();
            $table->boolean('img_type')->nullable();
            $table->string('photo', 250)->nullable();
            $table->string('slug', 200)->nullable();
            $table->text('details')->nullable();
            $table->integer('group_id')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->integer('delivery_time')->nullable();
            $table->string('delivery_time_type', 25)->nullable();
            $table->double('price')->nullable()->default(0);
            $table->string('end_date', 30)->nullable();
            $table->tinyInteger('pos')->default(0);
            $table->string('sku', 70)->nullable();
            $table->tinyInteger('affiliate_commission')->default(0);
            $table->tinyInteger('is_tax')->default(0);
            $table->double('min_qty')->default(0);
            $table->double('max_qty')->default(0);
            $table->tinyInteger('best')->nullable();
            $table->tinyInteger('show_home')->default(0);
            $table->tinyInteger('is_virtual')->default(0);
            $table->tinyInteger('special_deal')->default(0);
            $table->boolean('top_up')->default(false);
            $table->boolean('best_sell')->default(false);
            $table->integer('api_connection')->nullable();
            $table->tinyInteger('product_condition')->default(0);
            $table->string('type', 50)->nullable();
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
        Schema::dropIfExists('products');
    }
};
