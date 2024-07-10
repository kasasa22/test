<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'challenge_id', 'question', 'marks',
    ];

    // Relationships
    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
