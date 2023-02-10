<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('admin', function (Blueprint $table) {
                $table->id();
                $table->string('first_name');
                $table->string('last_name')->nullable();
                $table->string('username')->unique()->nullable();
                $table->string('photo')->nullable();
                $table->unsignedBigInteger('role_id');
                $table->string('email')->unique()->nullable();
                $table->string('password');
                $table->boolean('is_active')->default(TRUE);
                $table->string('avatar')->nullable();
                $table->string('slug')->nullable();
                $table->string('phone')->unique()->nullable();
                $table->date('date_of_birth')->nullable();
                $table->text('description')->nullable();
                $table->string('lang_code')->default('en');
                $table->unsignedBigInteger('currency_id')->default(2);
                $table->string('currency_code')->default('USD');
                $table->rememberToken();
                $table->timestamps();

        });
        Admin::create([
            'first_name'=>'admin',
            'username'=>'admin',
            'password'=>Hash::make('123123'),
            'role_id'=>1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
