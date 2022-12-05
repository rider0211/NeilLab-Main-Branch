<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLoad extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_type',
        'trade_id',
        'tx_id',
        'amount',
        'status',
    ];
}
