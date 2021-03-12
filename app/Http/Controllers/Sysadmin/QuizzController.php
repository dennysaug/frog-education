<?php

namespace App\Http\Controllers\Sysadmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuizzRequest;
use App\Question;
use App\Quizz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizzController extends Controller
{

    public function index()
    {
        $list = Quizz::all();
        $data = ['list'];
        return view('sysadmin.quizz.index', compact($data));
    }

    public function new()
    {
        return view('sysadmin.quizz.form');
    }

    public function questions(Quizz $quizz)
    {
        $data = [];

        if(!isset($quizz->id)) {
            $quizz = null;
        }


        array_push($data, 'quizz');

        if($quizz->user_id == Auth::user()->id) {
            return view('sysadmin.quizz.questions', compact($data));
        } else {
            return redirect()->route('sysadmin.quizz.index')->with('status', false)->with('msg', $e->getMessage());
        }
    }

    public function questionsStore(Request $request,Quizz $quizz)
    {
        $input = $request->except('_token');

//        dd($input['alternative']);

        try {

            if(isset($quizz->id)) {
                $quizz->update($input);
            } else {
                $input['user_id'] = Auth::user()->id;

                $quizz = Quizz::create($input);
                $questions_id = Question::inRandomOrder()->limit($quizz->quantity_question)->get()->pluck('id')->toArray();
                $quizz->quizzQuestions()->sync($questions_id);
            }

            return redirect()->route('sysadmin.quizz.question')->with('status',true)->with('msg', env('MSG_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('sysadmin.quizz.index')->with('status', false)->with('msg', $e->getMessage());
        }

    }

    public function store(Quizz $quizz, QuizzRequest $request)
    {
        $input = $request->only('quantity_question');

        try {

            if(isset($quizz->id)) {
                $quizz->update($input);
            } else {
                $input['user_id'] = Auth::user()->id;

                $quizz = Quizz::create($input);
                $questions_id = Question::inRandomOrder()->limit($quizz->quantity_question)->get()->pluck('id')->toArray();
                $quizz->quizzQuestions()->sync($questions_id);
            }

            return redirect()->route('sysadmin.quizz.question')->with('status',true)->with('msg', env('MSG_SUCCESS'));

        } catch (\Exception $e) {
            return redirect()->route('sysadmin.quizz.index')->with('status', false)->with('msg', $e->getMessage());
        }


    }

}
