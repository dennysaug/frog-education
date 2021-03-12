<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizzQuestion extends Model
{
    protected $fillable = [
        'quizz_id',
        'question_id',
        'alternative_id'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function quizz()
    {
        return $this->belongsTo(Quizz::class);
    }
}
