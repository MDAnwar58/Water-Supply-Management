<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    public function user_card()
    {
        return $this->belongsTo('App\Models\UserCard', 'user_card_id');
    }
}
