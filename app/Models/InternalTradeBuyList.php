<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalTradeBuyList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cronjob_list',
        'asset_purchased',
        'buy_amount',
        'delivered_address',
        'sender_address',
        'internal_treasury_wallet_id',
        'pay_with',
        'chain_stack',
        'pay_method',
        'transaction_description',
        'commision_id',
        'bank_changes',
        'left_over_profit',
        'total_amount_left',
        'tx_id',
        'state',
    ];
}
