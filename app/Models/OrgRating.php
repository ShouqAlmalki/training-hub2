<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class OrgRating extends Model
{
    use HasFactory;
 protected $fillable = 
 [
    'user_id',
    'organization_id',
    'overview',
    'rating',
    'status',
    'created_at',
    'updated_at',
 ];
 public function organization()
 {
     return $this->belongsTo(Organization::class);
 }
 public function user()
 {
     return $this->belongsTo(User::class);
 }
}
