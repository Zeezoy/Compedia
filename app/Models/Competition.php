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
        'prize',
        'status',
        'added_by',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getDaysLeftAttribute()
    {
        return max(
            0,
            now()->diffInDays($this->deadline, false)
        );
    }
}