<?php

namespace App\Models;

use App\Traits\Excludable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory, Excludable;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'status',
        'redeem_limit',
    ];
}
