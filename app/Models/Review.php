<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'customer_id',
        'hotel_id',
        'star',
        'comment'
    ];
    use HasFactory;

    public function customer(): object
    {
        return $this->belongsTo(Customer::class);
    }
    public function hotel(): object
    {
        return $this->belongsTo(Hotel::class);
    }
}
