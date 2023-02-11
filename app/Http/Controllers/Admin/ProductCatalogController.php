<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AddField;
use App\Models\ClientGroup;
use App\Models\Gallery;
use App\Models\GroupPricing;
use App\Models\InventoryGroup;
use App\Models\Pricing;
use App\Models\Product;
use App\Models\ProductGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductCatalogController extends Controller
{

    public function index()
    {
        $products = Product::where('type', null)->paginate(15);
        return view('admin.catalog.product.index', compact('products'));
    }


    public function create()
    {
        $groups = ProductGroup::whereStatus(1)->get();
        return view('admin.catalog.product.create', compact('groups'));
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
                'delivery_time' => 'required',
                'img_type' => 'required|in:1,2',
                'thumbnail' => $val,
                'delivery_time_type' => 'required',
                'price' => 'required|gt:0',
                'end_date' => 'required',
                'min_qty' => 'gte:0',
                'max_qty' => 'gt:min_qty',
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
        $product->delivery_time = $request->delivery_time;
        $product->delivery_time_type = $request->delivery_time_type;
        $product->price = $request->price;

        $product->end_date = $request->end_date;

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

        return redirect()->route('admin.product.catalog.edit', $product->id)->withSuccess(__('Product Addedd Successfully'));
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $groups  = ProductGroup::whereStatus(1)->get();
        $clientsGroup  = ClientGroup::get();
        return view('admin.catalog.product.edit', compact('product','groups','clientsGroup'));
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
                'delivery_time' => 'required',
                'delivery_time_type' => 'required',
                'price' => 'required|gt:0',
                'min_qty' => 'gte:0',
                'max_qty' => 'gt:min_qty',
                'end_date' => 'required',
                'img_type' => 'required|in:1,2',
                'thumbnail' => $val,
            ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $message = validateError($validator->getMessageBag()->toArray());
            return back()->with('error', $message);
        }

        $product = Product::findOrFail($id);
        $product->name      = $request->name;
        $product->img_type = $request->img_type;
        $product->details      = $request->details;
        $product->slug      = Str::slug($request->name);
        $product->group_id  = $request->group_id;
        $product->status    = $request->status;
        $product->pos       = $request->pos;
        $product->delivery_time = $request->delivery_time;
        $product->delivery_time_type = $request->delivery_time_type;
        $product->price     = $request->price;
        $product->end_date  = $request->end_date;
        $product->sku       = $request->sku;
        $product->affiliate_commission = $request->affiliate_commission;
        $product->is_tax    = $request->is_tax;
        $product->min_qty   = $request->min_qty;
        $product->max_qty   = $request->max_qty;
        $product->special_deal = $request->special_deal;
        $product->top_up = $request->top_up;
        $product->best_sell = $request->best_sell;


        if ($request->is_virtual) {
            $product->is_virtual = 1;
        } else {
            $product->is_virtual = 0;
        }

        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            $name = Str::random(9) . '.' . $photo->getClientOriginalExtension();
            $photo->move('assets/images', $name);
            $product->photo = $name;
        }
        else{
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
        return redirect()->route('admin.product.catalog.index')->withSuccess(__('Product Update Successfully'));
    }



    public function field($id)
    {
        $product = Product::findOrFail($id);
        $fields = AddField::whereProductId($id)->get();
        return view('admin.catalog.product.field', compact('product', 'fields'));
    }


    public function fieldSubmit(Request $request, $id)
    {

        if (count($request->type) > 0) {
            AddField::whereProductId($id)->delete();
            foreach ($request->type as $key => $type) {
                $field = new AddField();
                $field->type = $type;
                $field->name = $request->name[$key];
                $field->description = $request->description[$key];
                $field->field_options = $request->field_options[$key];
                $field->required = $request->required[$key];
                $field->product_id = $id;
                $field->save();
            }
            return back()->withSuccess(__('Data Update Successfully'));
        }
    }


    public function api($id)
    {
        $product = Product::findOrFail($id);
        $apis = InventoryGroup::get();
        return view('admin.catalog.product.api', compact('product', 'apis'));
    }

    public function apiSubmit(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->api_connection = $request->api;
        $product->update();
        return back()->withSuccess(__('Data Update Successfully'));
    }


    public function pricing($id)
    {
        $product = Product::findOrFail($id);
        $pricings = Pricing::whereProductId($id)->get();
        $apis = InventoryGroup::get();
        return view('admin.catalog.product.pricing', compact('product', 'pricings','apis'));
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
            $pricing->api_id = $request->api_id[$key];
            $pricing->save();
        }

        return back()->withSuccess(__('Data Update Successfully'));
    }

    public function groupPricingSubmit(Request $request,$product_id)
    {
        $request->validate(
            [
                'price.*' => 'required|gte:0',
            ],
            [
                'price.*.required' => 'Price is required',
                'price.*.gt' => 'Price must be greater than 0',
            ]
        );

        foreach ($request->price as $key => $item) {
            $pricing = GroupPricing::firstOrNew(['product_id' => $product_id,'group_id' => $key]);
            $pricing->price = $item;
            $pricing->save();
        }

        return back()->withSuccess(__('Pricing Updated Successfully'));

    }
}
