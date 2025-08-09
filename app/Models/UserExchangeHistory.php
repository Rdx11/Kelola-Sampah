<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExchangeHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'item_id',
        'points_used',
        'exchanged_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
