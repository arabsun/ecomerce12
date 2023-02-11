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
        Schema::create('proforma_invoices', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id');
            $table->integer('user_id')->nullable();
            $table->string('txn_number')->nullable();
            $table->double('amount')->default(0);
            $table->string('method', 30)->nullable();
            $table->string('txnid', 50)->nullable();
            $table->text('details')->nullable();
            $table->string('type', 40)->nullable();
            $table->text('admin_note')->nullable();
            $table->text('user_note')->nullable();
            $table->string('expire_date', 50)->nullable();
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
        Schema::dropIfExists('proforma_invoices');
    }
};
