<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // go to the model and get a group of records
      $questions = Question::all();
      // return the view, and pass in the group of records to loop through
      return view('questions.index')->with('questions', $questions);
    }

    (...)
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      // Use the model to get 1 record from the database
      $question = Question::findOrFail($id);
      // show the view and pass the record to the view
      return view('questions.show')->with('question', $question);
    }

    (...)
    
}