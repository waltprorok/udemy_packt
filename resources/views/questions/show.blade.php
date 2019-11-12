@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $question->title }}</h1>
        <p class="lead">
            {{ $question->description }}
        </p>

        <hr/>

        <form action="{{ route('answers.store') }}" method="POST">
            {{csrf_field()}}
            <h4>Submit Your Own Answer:</h4>
            <textarea class="form-control" name="content" rows="4"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id">
            <button class="btn btn-primary">Submit Answer</button>
        </form>
    </div>
@endsection