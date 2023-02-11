<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{

    public function master()
    {

        return view('admin.dashboard.main');
    }


    public function index()
    {
        return view('admin.dashboard.dashboard');
    }


    public function profile()
    {
        return view('admin.dashboard.profile');
    }


    public function profileUpdate(Request $request)
    {

        $rules =
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:admin,email,' . Auth::guard('admin')->user()->id,
                'phone' => 'required|string|max:255',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }


        $admin = Auth::guard('admin')->user();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        if ($request->hasFile('photo')) {
            @unlink(public_path('assets/images/' . $admin->photo));
            $image = $request->file('photo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('assets/images');
            $image->move($destinationPath, $name);
            $admin->photo = $name;
        }

        $admin->update();
        return back()->with('success', 'Profile updated successfully');
    }

    public function password(Request $request)
    {
        return view('admin.dashboard.password');
    }


    public function passwordUpdate(Request $request)
    {

        $rules =
            [
                'cpass' => 'required|min:4|max:14',
                'npass' => 'required|min:4|max:14',
                'repass' => 'required|min:4|max:14'
            ];

        $custom = [
            'npass.min'         => __('The password must be at least 4 characters'),
            'npass.required'    => __('The password field is required'),
            'cpass.required'    => __('The current password field is required'),
            'repass.min'        => __('The password must be at least 4 characters'),
            'repass.required'   => __('The password field is required'),
        ];


        $validator = Validator::make($request->all(), $rules, $custom);

        if ($validator->fails()) {
            return validateError(401, $validator->getMessageBag()->toArray());
        }

        $admin = Auth::guard('admin')->user();
        if ($request->cpass) {
            if (Hash::check($request->cpass, $admin->password)) {
                if ($request->npass == $request->repass) {
                    $input['password'] = Hash::make($request->npass);
                } else {
                    return back()->withError(__('Confirm password does not match.'));
                }
            } else {
                return back()->withError(__('Current password Does not match.'));
            }
        }
        $admin->update($input);
        return back()->with('success', 'Password updated successfully');
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }
}
