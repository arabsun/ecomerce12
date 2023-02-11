<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Session;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;


    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    public function insert()
    {
        Admin::create([
            'first_name'=>'admin',
            'username'=>'admin',
            'password'=>Hash::make('123123'),
            'role_id'=>1
        ]);
        return 'done';
    }

    /**
     * @param array $middleware
     */
    public function loginAdmin(LoginRequest $request)
    {
        try{
            if ($this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            }
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);
        }catch (\Exception $e){
            Session::flash('warning', __('The username or password are incorrect'));
            return redirect()->back();
        }
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();

        Session::invalidate();

        Session::regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/');
    }
    public function username()
    {
        return 'username';
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
    protected function authenticated(Request $request, $user)
    {
        if ( $user ) {// do your magic here
            return redirect()->route('admin.index');
        }
        return redirect('/home');
    }

}
