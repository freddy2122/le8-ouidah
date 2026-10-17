<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'reference',
        'locale',
        'tent_slug',
        'tent_name',
        'price_per_night_xof',
        'check_in',
        'check_out',
        'nights',
        'guests',
        'total_xof',
        'deposit_percent',
        'deposit_xof',
        'balance_xof',
        'guest_name',
        'guest_email',
        'guest_phone',
        'status',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];
}
