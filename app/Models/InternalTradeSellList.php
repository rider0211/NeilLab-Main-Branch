<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalTradeSellList extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cronjob_list',
        'asset_purchased',
        'sell_amount',
        'delivered_address',
        'sender_address',
        'internal_treasury_wallet_id',
        'internal_treasury_wallet_address',
        'pay_with',
        'chain_stack',
        'transaction_description',
        'commision_id',
        'bank_changes',
        'left_over_profit',
        'total_amount_left',
        'tx_id',
        'state',
    ];


















}
