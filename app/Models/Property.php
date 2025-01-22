<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'type',
        'address',
        'latitude',
        'longitude',
        'user_id',
        'status',
        'country',
        'bathrooms',
        'bedrooms',
        'area',
        'date',
        'city',
        'images',
        'agents_id',
    ];
}
