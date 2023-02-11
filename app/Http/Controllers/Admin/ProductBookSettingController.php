<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use Illuminate\Http\Request;

class ProductBookSettingController extends Controller
{
    public function index()
    {
        $gs = Generalsetting::first();
        return view('admin.service_product.book_settings', compact('gs'));
    }

    public function update (Request $request)
    {
        $gs = Generalsetting::first();
        $gs->book_status = $request->book_status;
        $gs->holidays = json_encode($request->holidays);
        $gs->save();
        return back()->with('success', 'Book Settings Updated Successfully');    
    }
    
  
}
