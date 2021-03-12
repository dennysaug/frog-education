<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    protected $fillable = [
        'question_id',
        'title',
        'correct'
    ];

    public function question()
    {
        return $this->hasOne(Question::class);
    }
}
