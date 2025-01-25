<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanReport extends Model
{
    use HasFactory;
    protected $table = "plan_reports";

    public $fillable = [
        "start_date",
        "end_date",
        "week1",
        "week2",
        "week3",
        "week4",
        "week5",
        "week6",
        "week7",
        "week8",
        "org_sub_name",
        "org_sub_email",
        "org_sub_phone",
        "org_sub_department",
        "organization_id",
        "training_type",
        "user_id",
        "status",
        "created_at",
        "updated_at",
    ];

        // Status constants
        const STATUS_UNDER_REVIEW = 0;
        const STATUS_ACCEPTED = 1;
        const STATUS_REJECTED = 2;

        public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            self::STATUS_UNDER_REVIEW => 'Under Review',
            self::STATUS_ACCEPTED => 'Accepted',
            self::STATUS_REJECTED => 'Rejected',
            default => 'Unknown',
        };
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $casts = [
        'start_date' => 'datetime', // This will ensure it's treated as a Carbon instance
        'end_date' => 'datetime', // This will ensure it's treated as a Carbon instance
        'created_at' => 'datetime', // This will ensure it's treated as a Carbon instance
        'updated_at' => 'datetime', // This will ensure it's treated as a Carbon instance
    ];

}
