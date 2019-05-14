@extends('template')

@section('content')
  <div class="container">
    <h1>{{ $question->title }}</h1>
    <p class="lead">
      {{ $question->description }}
    </p>

    <hr />

    <!-- display all of the answers for this question -->
    @if ($question->answers->count() > 0)
      @foreach ($question->answers as $answer)
        <div class="panel panel-default">
          <div class="panel-body">
            <p>
              {{ $answer->content }}
            </p>
          </div>
        </div>
      @endforeach
    @else
      <p>
        There are no answers for this question yet. Please consider submitting one below!
      </p>
    @endif


    <hr />

    <!-- display the form, to submit a new answer -->
    <form action="{{ route('answers.store') }}" method="POST">
      {{ csrf_field() }}

      <h4>Submit Your Own Answer:</h4>
      <textarea class="form-control" name="content" rows="4"></textarea>
      <input type="hidden" value="{{ $question->id }}" name="question_id" />
      <button class="btn btn-primary">Submit Answer</button>
    </form>
  </div>
@endsection