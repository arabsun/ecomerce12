<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.layouts.app');
    }
    public function aaa(){
        return view('admin.dashboard.dashboard');
    }
    public function profile()
    {
        return view('admin.dashboard.profile');
    }

}
