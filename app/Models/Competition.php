<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'organizer',
        'deadline',
        'registration_link',
        'guidebook_link',
        'registration_fee',
        'photo_url',
        'is_public',
    ];

    protected $casts = [

        'deadline' => 'date',
        'is_public' => 'boolean',

    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function rules()
    {
        return $this->hasMany(CompetitionRule::class);
    }

    public function stages()
    {
        return $this->hasMany(CompetitionStage::class);
    }

    public function prizes()
    {
        return $this->hasMany(CompetitionPrize::class);
    }

    public function getDaysLeftAttribute()
    {
        return max(
            0,
            now()->diffInDays($this->deadline)
        );
    }

    public function getStatusAttribute()
    {
        $startDate = $this->stages->min('start_date');
        $deadline = $this->deadline;

        if (!$startDate || !$deadline) {
            return 'Upcoming';
        }

        if (now()->lt($startDate)) {
            return 'Upcoming';
        }

        if (now()->gt($deadline)) {
            return 'Closed';
        }

        return 'Active';
    }

    public function getFormattedDeadlineAttribute()
    {
        return $this->deadline
            ->format('M d, Y');
    }
}