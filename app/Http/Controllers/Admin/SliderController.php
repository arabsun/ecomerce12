<?php

namespace App\Http\Controllers\Admin;

use Datatables;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

  
    //*** GET Request
    public function index()
    {
        $datas = Slider::orderBy('id','desc')->get();
        return view('admin.slider.index', compact('datas'));
    }

    //*** GET Request
    public function create()
    {
        return view('admin.slider.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        $request->validate([
            'photo'      => 'mimes:jpeg,jpg,png,svg',
        ]);
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Slider();
        $input = $request->all();
        if ($file = $request->file('photo')) 
         {      
            $name = time().str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/images',$name);           
            $input['photo'] = $name;
        } 
        $data->fill($input)->save();
        //--- Logic Section Ends

        return redirect(route('admin.slider.index'))->with('success','Slider Added Successfully!');
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Slider::findOrFail($id);
        return view('admin.slider.edit',compact('data'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
       
        $request->validate([
            'photo'      => 'mimes:jpeg,jpg,png,svg',
        ]);
        //--- Validation Section Ends

        //--- Logic Section
        $data = Slider::findOrFail($id);
        $input = $request->all();
            if ($file = $request->file('photo')) 
            {              
                $name = time().str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images/',$name);
                if($data->photo != null)
                {
                    if (file_exists(public_path().'/assets/images/'.$data->photo)) {
                        unlink(public_path().'/assets/images/'.$data->photo);
                    }
                }            
            $input['photo'] = $name;
            } 
        $data->update($input);
        //--- Logic Section Ends
         
        return redirect(route('admin.slider.index'))->with('success','Slider Updated Successfully.');
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = Slider::findOrFail($id);
        //If Photo Doesn't Exist
        if($data->photo == null){
            $data->delete();
            //--- Redirect Section     
            $msg = 'Data Deleted Successfully.';
            return response()->json($msg);      
            //--- Redirect Section Ends     
        }
        //If Photo Exist
        if (file_exists(public_path().'/assets/images/'.$data->photo)) {
            unlink(public_path().'/assets/images/'.$data->photo);
        }
        $data->delete();
        
        return redirect(route('admin.slider.index'))->with('success','Slider  Deleted Successfully.');
    }
}
