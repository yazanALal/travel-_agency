<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        "company_id",
        'city_id',
        'date_s',
        'date_s'
    ];

    protected $casts = [
        "company_id" => 'integer',
        'city_id' => 'integer',
        'date_s' => 'date',
        'date_s' => 'date',
    ];

    public function city(): object
    {
        return $this->belongsTo(City::class);
    }
    
   public function company(): object
    {
        return $this->belongsTo(Company::class);
    }
}
