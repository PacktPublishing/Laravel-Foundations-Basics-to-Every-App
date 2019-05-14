<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;

class QuestionController extends Controller
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
      // validate the form data
      $this->validate($request, [
        'title' => 'required|max:255'
      ]);
      // process the data and submit it
      $question = new Question();
      $question->title = $request->title;
      $question->description = $request->description;
      $question->user()->associate(Auth::id());

      // if successful we want to redirect
      if ($question->save()) {
        return redirect()->route('questions.show', $question->id);
      } else {
        return redirect()->route('questions.create');
      }
    }
    
    (...)
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $question = Question::findOrFail($id);
      if ($question->user->id != Auth::id()) {
       return abort(403);
      }
      return view('questions.edit');
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $question = Question::findOrFail($id);
      if ($question->user->id != Auth::id()) {
       return abort(403);
      }
      // update the question
    }
    
    (...)
    
}