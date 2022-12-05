<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomainList extends Model
{
    use HasFactory;
    protected $fillable = [
        'domain_name',
        'signup_page',
        'agreement_page',
        'last_page',
        'signup_user_number',
        'status',
        'del_flag',
    ];
}
