<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'gender',
        'phone',
    ];

    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'gender' => 'string',
        'phone' => 'string',
    ];


    public function Reviews():object{
        return $this->hasMany(Review::class);
    }

    public function Bookings():object{
        return $this->hasMany(Booking::class);
    }
}
