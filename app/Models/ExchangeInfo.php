<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'ex_name',
        'ex_login',
        'ex_password',
        'ex_sms_phone_number',
        'api_login',
        'api_password',
        'api_account_name',
        'api_key',
        'api_secret',
        'api_passphase',
        'api_fund_password',
        'api_doc',
        'api_doc_link',
        'bank_login',
        'bank_password',
        'bank_link',
        'bank_other',
        'contact_name',
        'contact_email',
        'contact_phone',
        'contact_telegram',
        'contact_whatsapp',
        'contact_skype',
        'contact_boom_boom_chat',
        'state'
    ];
}
