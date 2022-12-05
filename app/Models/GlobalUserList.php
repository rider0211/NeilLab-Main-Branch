<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalUserList extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_type",
        "email",
        "buy_weight",
        "amount_allow_to_buy",
        "sell_weight",
        "amount_allow_to_sell",
        "status",
        "user_id",
        "cold_storage_id",
        "set_for_trading_pairs",
        "selected_exchange",
        "wallet_address"
    ];
}
