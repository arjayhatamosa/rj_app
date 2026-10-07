<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description',
        'price',
        'capacity',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'capacity' => 'integer',
    ];
}