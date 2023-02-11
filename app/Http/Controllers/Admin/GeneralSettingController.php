<?php

namespace App\Http\Controllers\Admin;

use App\Models\ClientGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Generalsetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $gs = Generalsetting::first();
        $groups = ClientGroup::get();

        return view('admin.general_setting.index', compact('gs','groups'));
    }

    public function update(Request $request)
    {
        $gs = Generalsetting::firstOrFail();

        $validator = Validator::make($request->all(), [
            'logo'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_img'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_name' => 'required | max:50',
            'site_name'    => 'required | max:50',
        ]);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }


        $images_array = ['logo', 'favicon','user_img'];
        foreach ($images_array as $image) {
            if ($request->hasFile($image)) {
                $image_name = $image . '.' . $request->$image->getClientOriginalExtension();
                @unlink(public_path('assets/images/' . $gs->$image));
                $request->$image->move('assets/images/', $image_name);
                $gs->$image = $image_name;
            }
        }

        $gs->site_link = $request->site_link;
        $gs->site_ssl_link = $request->site_ssl_link;

        $gs->company_name = $request->company_name;
        $gs->site_name = $request->site_name;
        $gs->start_time = $request->start_time;
        $gs->end_time   = $request->end_time;
        $gs->color = '#'.$request->color;
        $gs->defult_group=$request->defult_group;

        $gs->update();
        return back()->with('success', 'General Setting Updated Successfully');

    }


    public function menu()
    {
        $gs = Generalsetting::first();
        return view('admin.general_setting.menu',compact('gs'));
    }

    public function menuUpdate(Request $request)
    {
       $menu = $this->setMenu($request->all());
       $gs = Generalsetting::first();
       $gs->menu = $menu;
       $gs->update();
       return back();

    }

    public function setMenu($input)
    {
         unset($input['menu']);
         unset($input['_token']);
         return json_encode($input);
    }

    public function cookie()
    {
        return view('admin.cookie');
    }

    public function updateCookie(Request $request)
    {
        $data = $request->validate([
            'status' => 'required',
            'button_text' => 'required',
            'cookie_text' => 'required'
        ]);

        $gs = Generalsetting::first();
        $gs->cookie = $data;
        $gs->update();
        return back()->with('success','Cookie concent updated');
    }

    public function socialLogin()
    {
        return view('admin.general_setting.social_login');
    }

    public function socialLoginUpdate(Request $request)
    {

        $request->validate([

          'google_login'     => 'required',
          'google_client_id' => 'required_if:google_login,ENABLE',
          'google_secret_id' => 'required_if:google_login,ENABLE',

          'facebook_login'     => 'required',
          'facebook_client_id' => 'required_if:facebook_login,ENABLE',
          'facebook_secret_id' => 'required_if:facebook_login,ENABLE',

          'twitter_login'     => 'required',
          'twitter_client_id' => 'required_if:twitter_login,ENABLE',
          'twitter_secret_id' => 'required_if:twitter_login,ENABLE',

        ]);

        $this->setEnv('GOOGLE_LOGIN',    $request->google_login);
        $this->setEnv('GOOGLE_CLIENT_ID',$request->google_client_id);
        $this->setEnv('GOOGLE_SECRET_ID',$request->google_secret_id);

        $this->setEnv('FACEBOOK_LOGIN',    $request->facebook_login);
        $this->setEnv('FACEBOOK_CLIENT_ID',$request->facebook_client_id);
        $this->setEnv('FACEBOOK_SECRET_ID',$request->facebook_secret_id);

        $this->setEnv('TWITTER_LOGIN',    $request->twitter_login);
        $this->setEnv('TWITTER_CLIENT_ID',$request->twitter_client_id);
        $this->setEnv('TWITTER_SECRET_ID',$request->twitter_secret_id);

        return back()->with('success','Social Login updated');
    }

    public function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($key),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }


    public function captchaSetting()
    {
        return view('admin.general_setting.captcha');
    }

    public function captchaSettingUpdate(Request $request)
    {
        $gs = Generalsetting::first();
        $gs->login_captcha    = $request->login_captcha;
        $gs->reg_captcha      = $request->reg_captcha;
        $gs->captcha_secret   = $request->secret_key;
        $gs->captcha_site_key = $request->site_key;
        $gs->save();

        $this->setEnv('NOCAPTCHA_SECRET', $request->secret_key);
        $this->setEnv('NOCAPTCHA_SITEKEY', $request->site_key);

        return back()->with('success','Captcha Setting updated');
    }

    public function emailConfig()
    {
        return view('admin.general_setting.email_config');
    }


    public function emailConfigUpdate(Request $request)
    {
        $this->validate($request,[
            'smtp_host' => 'required_if:mail_type,php_mailer',
            'smtp_port' => 'required_if:mail_type,php_mailer',
            'smtp_user' => 'required_if:mail_type,php_mailer',
            'smtp_pass' => 'required_if:mail_type,php_mailer',
            'mail_encryption' => 'required_if:mail_type,php_mailer',
            'from_email' => 'required',
            'from_name'  => 'required',
        ]);

        $gs = Generalsetting::firstOrFail();
        $gs->mail_type = $request->mail_type;
        $gs->smtp_host = $request->smtp_host;
        $gs->smtp_port = $request->smtp_port;
        $gs->smtp_user = $request->smtp_user;
        $gs->smtp_pass = $request->smtp_pass;
        $gs->mail_encryption = $request->mail_encryption;
        $gs->from_email = $request->from_email;
        $gs->from_name  = $request->from_name;
        $gs->save();

        return back()->with('success', 'Email Configuration Updated Successfully!');

    }
}
