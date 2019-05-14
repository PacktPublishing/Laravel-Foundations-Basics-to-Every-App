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
      $questions = Question::orderBy('id', 'desc')->paginate(5);
      // return the view, and pass in the group of records to loop through
      return view('questions.index')->with('questions', $questions);
    }
    
    (...)
    
}