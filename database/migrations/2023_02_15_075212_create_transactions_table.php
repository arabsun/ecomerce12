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
        Schema::create('transactions', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->integer('user_id')->nullable();
            $table->text('txn_number')->nullable();
            $table->double('amount')->nullable()->default(0);
            $table->binary('currency_sign')->nullable();
            $table->string('currency_code')->nullable();
            $table->double('currency_value')->default(0);
            $table->string('method')->nullable();
            $table->string('txnid')->nullable();
            $table->text('details')->nullable();
            $table->string('type')->nullable()->comment('plus, minus , reward');
            $table->string('admin_note')->nullable();
            $table->string('user_note')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
