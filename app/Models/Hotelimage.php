<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotelimage extends Model
{
    use HasFactory;
    protected $fillable = [
        'buf',
        'hotel_id',
    ];
}
