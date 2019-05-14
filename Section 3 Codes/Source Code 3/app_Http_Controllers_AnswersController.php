<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Auth;

class AnswersController extends Controller
{
    (...)
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'content' => "required|min:15",
        'question_id' => 'required|integer'
      ]);

      $answer = new Answer();
      $answer->content = $request->content;
      $answer->user()->associate(Auth::id());

      $question = Question::findOrFail($request->question_id);
      $question->answers()->save($answer);

      return redirect()->route('questions.show', $question->id);
    }
    
    (...)

    
}