<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\MailHelper;
use App\Models\Generalsetting;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminLoginController extends Controller
{
  public function __construct()
  {
//    $this->middleware('guest:admin', ['except' => ['logout']]);
  }

  public function showLoginForm()
  {
    return view('admin.login.login');
  }

  public function login(Request $request)
  {

    $request->validate([
      'email'   => 'required|email',
      'password' => 'required'
    ]);

    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
      return redirect(route('admin.dashboard'));
    }


    return back()->withErrors("'Credentials Doesn\'t Match !' ");
  }

  public function showForgotForm()
  {
    return view('admin.dashboard.forgot');
  }

  public function forgot(Request $request)
  {
      $gs = Generalsetting::findOrFail(1);
      if (Admin::where('email', '=', $request->email)->count() > 0) {
      // user found

      $admin = Admin::where('email', '=', $request->email)->firstOrFail();
      $token = md5(time() . $admin->name . $admin->email);
      $admin->email_verify_token = $token;
      $admin->update();

      $msg = "Please click this link : " . '<a href="' . route('admin.change.token', $token) . '>' . route('admin.change.token', $token) . '</a>' . ' to change your password.';

      // MailHelper::MailSend([
      //   'email'   => $admin->email,
      //   'name'    => $admin->name,
      //   'subject' => 'Reset Password Request :',
      //   'message' => $msg,
      // ]);

      return response()->json('Verification Link Sent Successfully!. Please Check your email.');

    } else {
      // user not found

      return response()->json(array('errors' => [0 => 'No Account Found With This Email.']));

    }
  }

  public function showChangePassForm($token)
  {
    return view('admin.dashboard.new_password', compact('token'));
  }

  public function changepass(Request $request)
  {

    $admin =  Admin::where('email_verify_token', $request->token)->first();
    if($admin) {

      if ($request->newpass == $request->renewpass) {
          $input['password'] = Hash::make($request->newpass);
      } else {
          return response()->json(array('errors' => [0 => 'Confirm password does not match.']));
      }

      $admin->email_verify_token = null;
      $admin->update($input);
      $msg = 'Successfully changed your password.<a href="' . route('admin.login') . '"> Login Now</a>';
      return response()->json($msg);

    } else {

      return response()->json(array('errors' => [0 => 'Token not found please resubmit forgot form.' . '<a href="' . route('admin.forgot') . '"> <b>Click Here </b> </a>']));
    }

  }

  public function logout()
  {
    Auth::guard('admin')->logout();
    return redirect('/');
  }

}
