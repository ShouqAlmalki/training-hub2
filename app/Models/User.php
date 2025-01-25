<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'supervisor_id',
        'section_number',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function supervisor()
    {
        return $this->belongsTo(User::class, 'supervisor_id');
    }
    public function students()
    {
        return $this->hasMany(User::class, 'supervisor_id');
    }

    public function scopeSupervisors($query)
    {
        return $query->where('role', 'supervisor');
    }

    public function scopeStudents($query)
    {
        return $query->where('role', 'student');
    }

    public function planReport()
    {
        return $this->hasOne(PlanReport::class);
    }

    public function weeklyReport()
    {
        return $this->hasOne(WeeklyReport::class);
    }

    public function finalReport()
    {
        return $this->hasOne(finalReport::class);
    }

    public function ratings()
    {
        return $this->hasOne(OrgRating::class);
    }

    public function websiteRating()
    {
        return $this->hasOne(WebsiteRating::class);
    }
}
