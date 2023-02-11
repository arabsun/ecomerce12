<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    // timestamp false
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
  

    // public function price()
    // {
    //     $price = 0;
    //     if(auth()->check()){
    //         $group = auth()->user()->group;
    //         $pricing = GroupPricing::where('group_id', $group->id)->where('product_id', $this->product->id)->first();
    //         if($pricing) $price =  $pricing->price;
    //     }
    //     else{
    //         $price = $this->price;
    //     }
    //     return $price;
    // }
}
