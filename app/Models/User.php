<?php

namespace App\Models;

use App\Mail\OTPVerify;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function OTP()
    {
        return Cache::get($this->OTPkey());
    }

    public function OTPkey()
    {
        return "OTP_for_{$this->id}";
    }

    public function cacheTheOTP()
    {
        $otp = rand(10000, 99999);
        Cache::put([$this->OTPkey() => $otp], now()->addSeconds(50));
        return $otp;
    }
    public function sendOTP($email)
    {
            Mail::to($email)->send(new OTPVerify($this->cacheTheOTP()));
    }
}
