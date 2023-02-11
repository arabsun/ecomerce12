<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;

class ManageCountryController extends Controller
{
    public function index()
    {
        $search = request('search');
        $countries = Country::when($search,function($q) use($search){$q->where('name','like',"%$search%");})->simplepaginate(16);
        return view('admin.country.index',compact('countries','search'));
    }

    public function update(Request $request)
    {

        $country = Country::findOrFail($request->id);
        $country->currency_id = $request->currency;
        $country->update();
        return back()->with('success','Country has been updated');
    }

    public function updateStatus($id)
    {
        $country = Country::findOrFail($id);
        $country->status = $country->status == 1 ? 0 : 1;
        $country->update();
        return back()->with('success','Country status updated');
    }


}
