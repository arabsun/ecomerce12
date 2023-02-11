<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderby('id','desc')->simplePaginate(15);
        return view('admin.order.index',compact('orders'));
    }

    public function serviceIndex()
    {
        $orders = ServiceOrder::orderby('id','desc')->get();
        return view('admin.order.service_index',compact('orders'));
    }


     public function details($id)
    {
        $order = Order::where('id',$id)->first();
        if(!$order) return response()->json(['error' => 'Order not found']);
        if($order->cart == "null") return response()->json(['error' => 'Order details not found']);
        $details = json_decode($order->cart);
        return view('admin.order.details',compact('details','order'));
    }

     public function Servicedetails($id)
    {
        $order = ServiceOrder::where('id',$id)->first();
        return view('admin.order.service_details',compact('order'));
    }
}
