<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionPrize extends Model
{
    protected $fillable = [
        'competition_id',
        'title',
        'amount',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}