<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quizz extends Model
{
    protected $fillable = [
        'user_id',
        'quantity_question'
    ];

    public function quizzQuestions()
    {
        return $this->belongsToMany(Question::class, 'quizz_questions', 'quizz_id', 'question_id');
    }
}
