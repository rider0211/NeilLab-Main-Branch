<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendFeeTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'fee_type',
        'chain_net',
        'amount',
        'tx_id',
        'user_id',
    ];
}
