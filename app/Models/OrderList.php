<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    protected $fillable =[
        'trade_id',
        'trade_type',
        'exchange_id',
        'superload_id',
        'order_id',
        'result_amount',
        'status',
    ];
}
