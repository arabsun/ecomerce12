<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['subtitle_text','title_text','details_text','photo','position','link','color'];
    public $timestamps = false;
}
