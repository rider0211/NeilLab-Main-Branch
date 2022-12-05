<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutLoads extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_id',
        'trade_type',
        'exchange_id',
        'user_id',
        'current_amount',
        'total_amount',
        'status',
    ];
}
