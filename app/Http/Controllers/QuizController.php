<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuizRequest;
use App\Models\Options;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;


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
        $quiz->title = $request->input('title');
        $quiz->save();

        $questions = $request->input('question_text');
        $options = $request->input('option');

          foreach ($questions as $question_text) {
            $question = new Question();
            $question->question_text = $question_text;
            $question->quiz_id = $quiz->id;
             $question->save();

              for($i=0; $i<=3; $i++){

                  $option = new Options();
                  $option->question_id = $question->id;
                  $option->option = $options[$i];
                  $correct = $request->input('correct');
                  if($correct === 'on') {

                  }
                  $option->save();

              }

              dd($correct);
          }



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
