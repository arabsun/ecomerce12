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
        Schema::create('countries', function (Blueprint $table) {
            $table->comment('');
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('phonecode', 10)->nullable();
            $table->string('flag')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        $sql_path = base_path('static_sql/countries.sql');
        DB::unprepared(file_get_contents($sql_path));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
};
