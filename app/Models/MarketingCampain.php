<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingCampain extends Model
{
    use HasFactory;
    protected $fillable = [
        'campain_name',
        'total_fee',
        'internal_sales_fee',
        'uni_level_fee',
        'external_sales_fee',
        'trust_fee',
        'profit_fee',
        'terms',
        'website_name',
        'banner_title',
        'banner_content',
        'trainee_video',
        'logo_image',
        'kyc_required',
        'status',
    ];
}
