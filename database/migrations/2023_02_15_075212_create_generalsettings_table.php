<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Generalsetting;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->comment('');
            $table->integer('id', true);
            $table->string('logo', 191)->nullable();
            $table->string('user_img')->nullable();
            $table->string('company_name', 100)->nullable();
            $table->string('site_name', 100)->nullable();
            $table->string('favicon', 80)->nullable();
            $table->string('site_link')->nullable();
            $table->string('color', 20)->nullable();
            $table->string('site_ssl_link')->nullable();
            $table->integer('defult_group');
            $table->string('is_seo_url')->nullable();
            $table->text('page_title_format')->nullable();
            $table->text('site_description')->nullable();
            $table->text('site_keys')->nullable();
            $table->integer('is_testimonial')->default(1);
            $table->text('menu')->nullable();
            $table->integer('book_status')->default(0);
            $table->string('holidays', 100)->nullable();
            $table->text('module_section')->nullable();
            $table->integer('kyc')->default(1);
            $table->string('curr_code', 10)->nullable();
            $table->string('curr_sym', 10)->nullable();
            $table->string('captcha_secret')->nullable();
            $table->string('captcha_site_key')->nullable();
            $table->string('fiat_access_key')->nullable();
            $table->string('crypto_access_key')->nullable();
            $table->boolean('kyc_type')->default(true);
            $table->text('cookie')->nullable();
            $table->boolean('login_captcha')->default(true);
            $table->boolean('reg_captcha')->default(true);
            $table->boolean('email_verify')->default(false);
            $table->string('mail_type', 20)->nullable();
            $table->string('smtp_host', 40)->nullable();
            $table->string('smtp_port', 40)->nullable();
            $table->string('smtp_user', 40)->nullable();
            $table->string('smtp_pass', 40)->nullable();
            $table->string('mail_encryption', 40)->nullable();
            $table->string('from_email', 40)->nullable();
            $table->string('from_name', 40)->nullable();
            $table->string('start_time', 30)->nullable();
            $table->string('end_time', 30)->nullable();
        });
        Generalsetting::create([
            'company_name'=>'Maak',
            'site_name'=>'Maak',
            'defult_group'=>'1',
            'color'=>'#f4f4f4'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('generalsettings');
    }
};
