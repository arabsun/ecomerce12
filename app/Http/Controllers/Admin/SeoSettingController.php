<?php
namespace App\Http\Controllers\Admin;

use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeoSettingController extends Controller{

    public function index()
    {
       $seosetting = SeoSetting::first();
       return view('admin.seo.index',compact('seosetting'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'meta_image'        => 'image|mimes:jpg,png',
            'title'             => 'required|max:200',
            'meta_tag'          => 'required|string',
            'meta_description'  => 'required|string',
        ]);
        
        $seoSetting = SeoSetting::first();
        $seoSetting->title = $request->title;
        $seoSetting->meta_description = $request->meta_description;
        $seoSetting->meta_tag = tagFormat($request->meta_tag);
        if($request->meta_image){
            $seoSetting->meta_image = uploadImage($request->meta_image,'assets/images',null,$seoSetting->meta_image);
        }
        $seoSetting->update();

        return back()->with('success','Seo Setting Updated Successfully');
    }

}