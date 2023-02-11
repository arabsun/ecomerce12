<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



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
            $table->comment('');
            $table->bigInteger('id', true);
            $table->string('username', 50);
            $table->string('email', 50);
            $table->string('password', 100);
            $table->string('phone', 14)->nullable();
            $table->string('photo', 250)->nullable();
            $table->string('role')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        Admin::create([
            'email'=>'admin@gmail.com',
            'username'=>'admin',
            'password'=>Hash::make('123'),
            'role'=>'super-admin'
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
