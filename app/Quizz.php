<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Quizz extends Model
{
    protected $fillable = [
        'user_id',
        'quantity_question'
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user', function (Builder $builder) {
            $builder->where('user_id', Auth::user()->id);
        });
    }

    public function quizzQuestions()
    {
        return $this->belongsToMany(Question::class, 'quizz_questions', 'quizz_id', 'question_id');
    }

    public function quizzAlternative()
    {
        return $this->belongsToMany(Alternative::class, 'quizz_questions', 'quizz_id', 'alternative_id');
    }

    public function correct()
    {
        $correct_id = [];
        if($this->quizzQuestions->count()) {
            foreach ($this->quizzQuestions as $question) {
                $correct_id[$question->id] = $question->alternatives()->where('correct','Y')->first()->id;
            }
        }
        return $correct_id;
    }
}
