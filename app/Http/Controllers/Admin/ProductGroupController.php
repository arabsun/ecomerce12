<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductGroupController extends Controller
{


    public function index()
    {
        $groups = ProductGroup::paginate(6);
        return view('admin.catalog.group.index', compact('groups'));
    }
    public function create()
    {
        return view('admin.catalog.group.create');
    }
    public function store(Request $request)
    {

        $rules =
            [
                'name' => 'required|unique:product_groups,name|max:50',
                'photo' => 'image|mimes:jpg,png,svg,jpeg',
            ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $group = new ProductGroup();
        $group->parent_id = $request->parent_id;
        $group->status = $request->status;
        $group->name = $request->name;
        $group->slug = Str::slug($request->name);

        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
            $photo->move('assets/images', $name);
            $group->photo = $name;
        }

        if ($request->parent_id) {
            $group->type = 'sub';
        } else {
            $group->type = 'cat';
        }
        $group->save();
        return back()->withSuccess(__('Group Addedd Successfully'));
    }
    public function edit($id)
    {
        $group = ProductGroup::findOrFail($id);
        return view('admin.catalog.group.edit', compact('group'));
    }
    public function update(Request $request, $id)
    {

        $rules =
            [
                'name' => 'required|max:50|unique:product_groups,name,' . $id,
                'photo' => 'image|mimes:jpg,png,svg,jpeg',
            ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $group = ProductGroup::findOrFail($id);
        $group->parent_id = $request->parent_id;
        $group->slug = Str::slug($request->name);

        $group->status = $request->status;
        $group->name = $request->name;
        $group->meta_title = $request->meta_title;
        $group->meta_description = $request->meta_description;
        $group->description = $request->meta_titldescriptione;

        if ($request->hasFile('photo')) {
            $photo = $request->photo;
            $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
            @unlink('assets/images/' . $group->photo);
            $photo->move('assets/images', $name);
            $group->photo = $name;
        }
        $group->update();
        return back()->withSuccess(__('Group Update Successfully'));
    }

    
    public function delete($id)
    {
       $group = ProductGroup::findOrFail($id);
       $group->delete();
             return response()->json(['success' => 'Deleted successfully']);
    }
}
