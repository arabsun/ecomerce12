<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProfileRequest;
use App\Http\Requests\admin\ResetPasswordRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function profile(){
        try {
            $user = Admin::findOrFail(auth('admin')->user()->id);
            return view('admin.profile',compact('user'));
        }catch (\Exception $e){
            Session::flash('warning', __('The username or password are incorrect'));
            return redirect()->route('admin.index');
        }
    }
    public function profileForm(ProfileRequest $request){
        try{
            $user = Admin::findOrFail(auth('admin')->user()->id)->update([
                "first_name" => $request->first_name,
                "last_name" => $request->last_name,
                "photo" => $request->photo,
                "email" => $request->email,
                "avatar" => $request->avatar,
                "slug" => auth('admin')->user()->username,
                "phone" => $request->phone,
                "date_of_birth" => $request->date_of_birth,
                "description" => $request->description,
                "lang_code" => $request->lang_code,
//                "currency_id" => $request->currency_id,
//                "currency_code" => $request->currency_code,
            ]);
            if($user){
                Session::flash('success', __('Profile updated successfully'));
                return redirect()->back();
            }
            Session::flash('warning', __('The username or password are incorrect'));
            return redirect()->back();
        }catch (\Exception $e){
            Session::flash('warning', __('The username or password are incorrect'));
            return redirect()->back();
        }
    }
    public function resetPassword(){
        return view('admin.reset_password');
    }
    public function resetPasswordForm(ResetPasswordRequest $request){
        try{
            $user = Admin::findOrFail(auth('admin')->user()->id)->update([
                'password'=>Hash::make($request->newpwd),
            ]);
            if($user){
                Session::flash('success', __('Password updated successfully'));
                return redirect()->back();
            }
            Session::flash('warning', __('The username or password are incorrect'));
            return redirect()->back();

        }catch (\Exception $e){
            Session::flash('warning', __('The username or password are incorrect'));
            return redirect()->back();
        }
    }
}
