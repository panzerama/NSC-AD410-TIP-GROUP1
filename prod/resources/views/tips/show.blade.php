@extends('layouts.app')
@section('content')
@foreach($answers as $question)
    {{ $question->question_number }}
    {{ $question->question_text }} </br>
    @if ($question->question_type == "TEXT")

    @elseif ( $question->question_type == "DROPDOWN")       
        @foreach ($question->answer as $values)
            {{ $values->answer_text }} <br>
        @endforeach
    @elseif ($question->question_type == "RADIO")       
   
    @elseif ($question->question_type == "CHECKBOX")
    @endif

@endforeach

@endsection