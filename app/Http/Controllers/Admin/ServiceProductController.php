<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Pricing;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceProductController extends Controller
{
    public function index()
    {
        $products = Product::whereType('service')->get();
        return view('admin.service_product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.service_product.create');
    }


    public function store(Request $request)
    {

        if (request('img_type') == 1) {
           $val =  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
            $val = 'required';
        }

        $rules =
            [
                'name' => 'required|max:50|unique:products,name',
                'group_id' => 'required',
                'status' => 'required',
                'price' => 'required|gt:0',
                'img_type' => 'required|in:1,2',
                'thumbnail' => $val,
                'gallery.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->img_type = $request->img_type;
        $product->details      = $request->details;
        $product->slug = Str::slug($request->name);
        $product->group_id = $request->group_id;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->type = 'service';

        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
            $photo->move('assets/images', $name);
            $product->photo = $name;
        }
        else{
            $product->photo = $request->thumbnail;
        }

        $product->save();


        if ($request->gallery) {
            foreach ($request->gallery  as $key => $item) {
                $photo = $request->gallery[$key];
                $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
                $photo->move('assets/images', $name);
                $gallery = new Gallery();
                $gallery->product_id = $product->id;
                $gallery->photo = $name;
                $gallery->save();
            }
        }

        return redirect()->route('admin.service.product.index')->withSuccess(__('Product Addedd Successfully'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.service_product.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        if (request('img_type') == 1) {
            $val =  'image|mimes:jpeg,png,jpg,gif,svg|max:2048';
        } else {
             $val = 'required';
        }
 
        $rules =
            [
                'name' => 'required|max:50|unique:products,name,' . $id,
                'group_id' => 'required',
                'status' => 'required',
                'price' => 'required|gt:0',
                'img_type' => 'required|in:1,2',
                'thumbnail' => $val,

            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->img_type = $request->img_type;
        $product->details = $request->details;
        $product->slug = Str::slug($request->name);
        $product->group_id = $request->group_id;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->type = 'service';


        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            @unlink('assets/images/' . $product->photo);
            $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
            $photo->move('assets/images', $name);
            $product->photo = $name;
        }else{
            $product->photo = $request->thumbnail;
        }

        if ($request->gallery) {
            foreach ($request->gallery  as $key => $item) {
                $photo = $request->gallery[$key];
                $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
                $photo->move('assets/images', $name);
                $gallery = new Gallery();
                $gallery->product_id = $product->id;
                $gallery->photo = $name;
                $gallery->save();
            }
        }

        $product->update();
        return redirect()->route('admin.service.product.index')->withSuccess(__('Product Update Successfully'));
    }

    public function pricing($id)
    {
        $product = Product::find($id);
        return view('admin.service_product.pricing', compact('product'));
    }

    public function pricingSubmit(Request $request, $product_id)
    {
        $request->validate(
            [
                'price.*' => 'required|gt:0',
                'title.*' => 'required',
            ],
            [
                'price.*.required' => 'Price is required',
                'price.*.gt' => 'Price must be greater than 0',
            ]
        );
        $product = Product::findOrFail($product_id);
        $pricing = $product->pricings;
        if ($pricing->count() > 0) {
            foreach ($pricing as $key => $item) {
                $item->delete();
            }
        }

        foreach ($request->price as $key => $item) {
            $pricing = new Pricing();
            $pricing->product_id = $product_id;
            $pricing->price = $request->price[$key];
            $pricing->title = $request->title[$key];
            $pricing->save();
        }

        return back()->withSuccess(__('Data Update Successfully'));
    }
    
    public function delete($id)
    {
        $product = Product::find($id);
        if(!$product) {
            return response()->json(['error' => 'Product not found']);
        }
        $product->delete();
        return response()->json(['success' => 'Deleted successfully']);
    }
}
