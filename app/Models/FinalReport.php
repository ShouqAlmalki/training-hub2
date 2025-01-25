<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class FinalReport extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "introduction",
        "training_plan",
        "overall_experiance",
        "recommendations",
        "conclusion",
        "reference",
        "status",
        "created_at",
        "updated_at",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'created_at' => 'datetime', // This will ensure it's treated as a Carbon instance
        'updated_at' => 'datetime', // This will ensure it's treated as a Carbon instance
    ];
}
