<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'company_id',
        'date_s',
        'date_e',
    ];
    protected $casts = [
        'city_id' => 'integer',
        'company_id' => 'integer',
        'date_s' => 'date',
        'date_e' => 'date',
    ];

    public function company(): object
    {
        return $this->belongsTo(company::class);
    }
    public function city(): object
    {
        return $this->belongsTo(city::class);
    }
    public function booking(): object
    {
        return $this->hasMany(booking::class);
    }
}
