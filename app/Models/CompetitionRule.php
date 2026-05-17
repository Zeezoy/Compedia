<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetitionRule extends Model
{
    protected $fillable = [
        'competition_id',
        'rule',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}