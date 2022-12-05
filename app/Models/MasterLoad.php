<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLoad extends Model
{
    use HasFactory;
    protected $fillable = [
        'trade_type',
        'trade_id',
        'internal_treasury_wallet_id',
        'sending_address',
        'tx_id',
        'amount',
    ];
}
