<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionStage extends Model
{
    protected $fillable = [
        'competition_id',
        'title',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}