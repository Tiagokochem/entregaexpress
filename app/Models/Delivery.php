<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'pickup_location',
        'delivery_location',
        'status',
    ];

    public function company()
    {
        return $this->belongsTo(User::class, 'company_id');
    }
}
