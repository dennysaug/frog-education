<?php

use App\Alternative;
use App\Question;
use App\Quizz;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = factory(Question::class,10)
            ->create()
            ->each(function ($question){
                if($question->category_id == 1) {
                    //true or false
                    $question->alternatives()->createMany([
                        factory(Alternative::class)->make(['title' => 'False'])->toArray(),
                        factory(Alternative::class)->make(['title' => 'True'])->toArray()
                    ]);
                } else {
                    //multiple choice
                    $question->alternatives()->createMany(
                        factory(Alternative::class,4)->make()->toArray()
                    );
                }

                $question->alternatives()->inRandomOrder()->first()->update(['correct' => 'Y']);

            });


        $quizz = Quizz::create([
            'user_id' => 1,
            'quantity_question' => 5
        ]);

        $questions_id = Question::inRandomOrder()->limit($quizz->quantity_question)->get()->pluck('id')->toArray();
        $quizz->quizzQuestions()->sync($questions_id);


//
    }
}
