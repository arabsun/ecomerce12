<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientGroup extends Model
{
    use HasFactory;

    public function pricings()
    {
        return $this->hasMany(GroupPricing::class,'group_id');
    }

    public function price($product_id)
    {
       $pricing = $this->pricings()->where('product_id', $product_id)->first();
       if($pricing) return $pricing->price;
       else return 0;
    }
}
