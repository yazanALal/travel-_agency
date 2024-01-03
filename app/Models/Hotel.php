<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';
    protected $fillable = [
        'name',
        'image',
        'phone',
        'city_id',
    ];
    use HasFactory;

    public function city(): object
    {
        return $this->belongsTo(City::class);
    }

    public function rates(): object
    {
        return $this->hasMany(Review::class);
    }
    public function hotel_images(): HasMany
    {
        return $this->hasMany(Hotelimage::class);
    }
}
