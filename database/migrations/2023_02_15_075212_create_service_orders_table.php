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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id', true);
            $table->integer('user_id')->nullable();
            $table->string('order_number')->nullable();
            $table->text('service')->nullable();
            $table->string('txn_id', 40)->nullable();
            $table->string('date', 50)->nullable();
            $table->string('time')->nullable();
            $table->string('order_status', 30)->nullable();
            $table->string('payment_status', 15)->nullable();
            $table->string('payment_method', 25)->nullable();
            $table->double('total_amount')->default(0);
            $table->string('customer_first_name', 40)->nullable();
            $table->string('customer_last_name', 40)->nullable();
            $table->string('customer_email', 80)->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_city', 50)->nullable();
            $table->string('customer_phone', 60)->nullable();
            $table->string('customer_zip', 50)->nullable();
            $table->string('customer_country', 70)->nullable();
            $table->string('customer_state', 50)->nullable();
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
        Schema::dropIfExists('service_orders');
    }
};
