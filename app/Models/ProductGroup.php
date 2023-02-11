<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    public function children()
    {
        return ProductGroup::where('parent_id',$this->id)->get();
    }
}
