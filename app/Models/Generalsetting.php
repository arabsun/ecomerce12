<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generalsetting extends Model
{
    use HasFactory;
    public $timestamps = false;
      /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];
    protected $casts = ['cookie' => 'object'];

    public function getCookieAttribute()
    {
        return json_decode($this->cookie);
    }
} 
