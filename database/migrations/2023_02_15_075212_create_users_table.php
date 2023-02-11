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
        Schema::create('users', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->integer('referred_by')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('zip', 25)->nullable();
            $table->decimal('balance', 20, 10)->default(0);
            $table->tinyInteger('status')->default(1);
            $table->boolean('email_verified')->nullable()->default(false);
            $table->string('verification_link')->nullable();
            $table->integer('verify_code')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->boolean('kyc_status')->nullable()->default(false);
            $table->text('kyc_info')->nullable();
            $table->string('kyc_reject_reason')->nullable();
            $table->boolean('two_fa_status')->default(false);
            $table->boolean('two_fa')->default(false);
            $table->integer('two_fa_code')->nullable();
            $table->string('api_key')->nullable();
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
        Schema::dropIfExists('users');
    }
};
