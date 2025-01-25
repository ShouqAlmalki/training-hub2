<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebsiteRating extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "opinion",
        "created_at",
        "updated_at",
    ];

    
}
