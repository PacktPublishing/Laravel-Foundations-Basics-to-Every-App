@extends('template')

@section('content')
  <div class="container">
    <h1>{{ $question->title }}</h1>
    <p class="lead">
      {{ $question->description }}
    </p>

    <hr />
  </div>
@endsection