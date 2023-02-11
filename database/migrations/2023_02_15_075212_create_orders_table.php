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
        Schema::create('orders', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id', true);
            $table->integer('user_id')->nullable();
            $table->string('order_number', 25)->nullable();
            $table->string('txn_id', 50)->nullable();
            $table->string('order_status', 25)->nullable();
            $table->string('payment_status', 30)->nullable();
            $table->string('payment_method', 25)->nullable();
            $table->text('cart')->nullable();
            $table->double('total_amount')->default(0);
            $table->string('customer_first_name', 50)->nullable();
            $table->string('customer_email', 50)->nullable();
            $table->string('customer_address', 222)->nullable();
            $table->string('customer_last_name', 40)->nullable();
            $table->string('customer_city', 50)->nullable();
            $table->string('customer_phone', 30)->nullable();
            $table->string('customer_zip', 25)->nullable();
            $table->string('customer_country', 30)->nullable();
            $table->string('customer_state', 30)->nullable();
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
        Schema::dropIfExists('orders');
    }
};
