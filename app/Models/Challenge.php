<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $fillable = [
        'name', 'start_date', 'end_date', 'duration', 'number_of_questions',
    ];

    // Relationships
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
