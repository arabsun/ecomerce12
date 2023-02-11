<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\TextUI\XmlConfiguration\Group;

class Product extends Model
{
    
    use HasFactory;

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function pricings()
    {
        return $this->hasMany(Pricing::class);
    }

    public function price()
    {
        $price = 0;
        if(auth()->check()){
            $group = auth()->user()->group;
            $pricing = GroupPricing::where('group_id', $group->id)->where('product_id', $this->id)->first();
            if($pricing) $price =  $pricing->price;
        }
        else{
            $price = $this->price;
        }
        return $price;
    }

}
