@extends('template')

@section('name')
  <div class="container">

    <div class="jumbotron">
      <h1>Ask a Question!</h1>
      <p>Ask any question you want to know and we will get the answers for you.</p>
      <p><a href="#" class="btn btn-primary btn-lg" role="button">Ask Now</a>
    </div>

    <h2>Recent Questions:</h2>

    @foreach ($questions as $question)
    <div class="well">
      <p class="lead">{{ $question }}</p>
    </div>
    @endforeach

  </div>
@endsection