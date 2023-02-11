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
        Schema::create('client_groups', function (Blueprint $table) {
            $table->comment('');
            $table->bigInteger('id', true);
            $table->string('group_name', 70)->nullable();
            $table->tinyInteger('is_group_pricing')->default(0);
            $table->string('membership_type', 25)->nullable();
            $table->integer('membership_time')->nullable();
            $table->double('membership_fee')->default(0);
            $table->double('fund_min_limit')->default(0);
            $table->double('fund_max_limit')->default(0);
            $table->tinyInteger('is_retail_group')->default(0);
            $table->tinyInteger('is_kyc')->default(0);
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
        Schema::dropIfExists('client_groups');
    }
};
