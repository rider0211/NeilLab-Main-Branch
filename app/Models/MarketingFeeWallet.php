<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingFeeWallet extends Model
{
    use HasFactory;
    protected $fillable = [
        'fee_type',
        'chain_net',
        'wallet_address',
        'private_key',
        'status',
    ];
}
