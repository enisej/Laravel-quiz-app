<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultsRequest;
use App\Models\Question;
use App\Models\Results;
use App\Models\UserOption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $allResults = Result::orderBy('created_at', 'desc')->get();

        return view('results.index', ['allResults' => $allResults]);

    }

    public function store(StoreResultsRequest $request)
    {
        $score = 0;
        $questions = $request->input('option');

        if ($questions) {
            foreach ($questions as $key => $value) {
                $question = Question::find($key);
                $userCorrectAnswers = 0;
                foreach ($value as $answerKey => $answerValue) {
                    if ($answerValue == 1) {
                        $userCorrectAnswers++;
                    } else {
                        $userCorrectAnswers--;
                    }
                }
                if ($question->correctOptionsCount() == $userCorrectAnswers) {
                    $score++;
                }
            }

        //dd($option);

        $result = new Results();
        $result->user_id = Auth::user()->id;
        $result->quiz_id = $request->input('quiz_id');
        $result->correct_answers = $score;
        $result->questions_count = count($request->input('question_id'));
        $result->save();

            foreach ($questions as $key => $value) {
                foreach ($value as $answerKey => $answerValue) {
                    $userOption = new UserOption();
                    $userOption->user_id = Auth::user()->id;
                    $userOption->result_id = $result->id;
                    $userOption->question_id = $key;
                    $userOption->quiz_id = $request->input('quiz_id');
                    $userOption->option_id = $answerKey;
                    $userOption->save();
                }
            }

        return redirect(route('results.show', $result->id));
        }
        else {
            return redirect()->back();
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Results::find($id);

        return view('results.show', ['result' => $result]);
    }
}
