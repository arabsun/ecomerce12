<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.user.user-index');
    }
    public function content(Request $request){
        if (view()->exists('frontend.user.ajax.'.$request->content)) {
            return view('frontend.user.ajax.'.$request->content);
        } elseif($request->content == ''){
            return view('frontend.user.ajax.dashboard');
        } else{
            return -1;
        }
    }
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('login');
    }

}
