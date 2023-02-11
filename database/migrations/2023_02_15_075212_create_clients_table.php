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
        Schema::create('clients', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id', true);
            $table->string('username', 40)->nullable();
            $table->string('password', 80)->nullable();
            $table->string('email', 40)->nullable();
            $table->double('balance')->default(0);
            $table->double('due_balance')->default(0);
            $table->string('user_type', 15)->nullable();
            $table->string('status', 15)->nullable();
            $table->string('first_name', 40)->nullable();
            $table->string('last_name', 40)->nullable();
            $table->string('company', 50)->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('zip', 9)->nullable();
            $table->string('country', 25)->nullable();
            $table->string('country_code', 10)->nullable();
            $table->string('phone')->nullable();
            $table->tinyInteger('is_phone_verify')->default(0);
            $table->string('phone_verify_token', 25)->nullable();
            $table->boolean('group_id');
            $table->integer('newsletter')->default(0);
            $table->integer('is_kyc')->default(0);
            $table->text('kyc_info')->nullable();
            $table->string('kyc_status', 10)->nullable()->default('pending');
            $table->string('kyc_id')->nullable();
            $table->integer('is_transfer_credit')->default(0);
            $table->integer('affiliate')->default(0);
            $table->double('add_min_found')->default(1);
            $table->double('add_max_found')->default(1);
            $table->integer('is_client')->default(0);
            $table->integer('ga')->default(0)->comment('google authenticator status');
            $table->string('gac', 30)->nullable()->comment('google authentication key');
            $table->integer('gv')->nullable()->comment('google authentication verification');
            $table->string('google_id')->nullable();
            $table->string('facebook_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->string('email_token', 250)->nullable();
            $table->boolean('email_verified')->default(true);
            $table->string('verify_code', 20)->nullable();
            $table->integer('currency_id');
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
        Schema::dropIfExists('clients');
    }
};
