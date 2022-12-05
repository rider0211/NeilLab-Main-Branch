<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_type',
        'trade_id',
        'superload_id',
        'exchange_id',
        'amount',
        'withdraw_order_id',
        'manual_flag',
        'status',
    ];
}
