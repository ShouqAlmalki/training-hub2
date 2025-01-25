<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public $fillable = ['name'];
    public function ratings()
    {
        return $this->hasMany(OrgRating::class);
    }
}
