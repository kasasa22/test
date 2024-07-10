<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'answer',
    ];

    // Relationships
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    // Other methods or properties can be added as needed

    // Example method to retrieve the related challenge
    public function getChallenge()
    {
        return $this->question->challenge;
    }
}
