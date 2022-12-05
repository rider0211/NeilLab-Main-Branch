<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralProfit extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function from()
    {
        return $this->belongsTo(User::class, 'from_id', 'id');
    }

    public function stack()
    {
        return $this->belongsTo(ChainStack::class, 'stack_id', 'id');
    }
}
