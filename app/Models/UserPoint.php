<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPoint extends Model
{
    use HasFactory;

    protected $table = 'user_points';

    protected $fillable = [
        'user_id',
        'point',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Report
    public function report()
    {
        return $this->belongsTo(Report::class);
    }
}
