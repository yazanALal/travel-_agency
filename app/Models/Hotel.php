<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        'city_id',
        'phone',
    ];

    protected $casts = [
        'name' => 'string',
        'city_id' => 'integer',
        'phone' => 'string',
    ];
}
