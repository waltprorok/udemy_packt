@extends('template')

@section('content')

    <div class="container">
        <h1>{{$user->name}}'s Profile</h1>

        <p>
            See what {{ $user->name }} has been up to on Laravel Answers.
        </p>
        <hr/>

        <div class="row">
            <div class="col-md-6">
                <h3>Questions</h3>
                @foreach($user->questions as $question)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>{{$question->title}}</p>
                        </div>
                        <div class="panel-body">
                            <p>
                                {{ $question->description }}
                            </p>
                        </div>
                        <div class="panel-footer">
                            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-link">View
                                Question</a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="col-md-6">
                <h3>Answers</h3>
                @foreach($user->answers as $answer)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $answer->question->title }}
                        </div>
                        <div class="panel-body">
                            <p>
                                <small>{{ $user->name }}'s answer:</small>
                                {{ $answer->content }}
                            </p>
                            <a href="{{ route('questions.show', $answer->question->id) }}" class="btn btn-sm btn-link">View
                                All Answers for this Question</a>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>

    </div>



@endsection