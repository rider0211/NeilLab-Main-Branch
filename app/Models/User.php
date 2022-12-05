<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'marketing_campain_id', 'first_name','last_name', 'email', 'password', 'redirect', 'referral_code', 'user_type', 'state', 'whatsapp', 'boomboomchat', 'telegram', 'theme_mode',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function referers()
    {
        return $this->hasMany(Referral::class);
    }

    public function invited_users()
    {
        return $this->hasMany(Referral::class, 'referred_id');
    }

    public function profiters()
    {
        return $this->hasMany(ReferralProfit::class);
    }

    public function from_users()
    {
        return $this->hasMany(ReferralProfit::class, 'from_id');
    }

}
