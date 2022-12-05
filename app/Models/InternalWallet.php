<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalWallet extends Model
{
    use HasFactory;
    protected $fillable = [
        "chain_stack",
        "wallet_address",
        "private_key",
        "wallet_type",
        "cold_storage_wallet_id"
    ];
}
