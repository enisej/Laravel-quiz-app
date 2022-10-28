<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Models\Options;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;


class QuizController extends Controller
{

    public function index()
    {
        $quizes = Quiz::all();

        return view('quizes.index', ['quizes' => $quizes]);
    }

    public function create()
    {
        $quizes = Quiz::all();

        return view('quizes.create', ['quizes'=>$quizes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizRequest $request)
    {
        $quiz = new Quiz();
        $question = new Question();
        $options = new Options();

        $quiz->title = $request->input('title');
        $quiz->save();

        $question->question_text = $request->input('question_text');
        $question->quiz_id = $quiz->id;
        $question->save();

        $questionToAdd = Question::latest()->first();;
        $questionID = $questionToAdd->id;

        return redirect(route('quizes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $quiz = Quiz::find($id);
        $quiz->delete();

        return redirect(route('quizes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::find($id);

        return view('quizes.show', ['quiz' => $quiz]);
    }
}
