<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'txn_number',
        'amount',
        'currency_sign',
        'currency_code',
        'currency_value',
        'method',
        'txnid',
        'details',
        'type',
        'admin_note',
        'user_note',
    ];

}
