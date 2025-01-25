<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class WeeklyReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'week_number',
        'topics',
        'skills',
        'status',
    ];

    protected $casts = [
        'topics' => 'array', // Automatically cast JSON to array
        'skills' => 'array', // Automatically cast JSON to array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
