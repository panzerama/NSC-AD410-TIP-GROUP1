@extends('layouts.app')

@section('title', 'Previous TIP')

@section('content')

@php

@endphp

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <h2>Previous TIP</h2> 
                
                <!-- Start TIP questions form -->
                <form id="tip" class="form-horizontal">
                    {{ csrf_field() }}
                
                <!-- start foreach loop through questions -->
                @foreach($questions as $question)
                    <div class="ibox float-e-margins">
                        
                     <!-- output question_text and then question_desc (example answer) in '?' popover--->   
                    <div class="ibox-title">
                            <h5 style="font-size:1.2em">{{ $question->question_text }}</h5>
                    </div><!-- ibox title-->    
                    
                    
                    <div class="ibox-content">
                    <div class="form-group">
        
                    <!-- start if/else block that outputs different HTML based on question_type (TEXT, DROPDOWN, RADIO, CHECKBOX) -->
                    @if ($question->question_type == "TEXT")
                            <div class="col-lg-8 col-sm-12">
                            <textarea class="form-control" name="{{ $question->question_id }}" value="{{ $question->question_id }}" rows="4" cols="60"></textarea>
                    @elseif ( $question->question_type == "DROPDOWN")       
                            <div class="col-sm-4">
                            <select class="form-control" name="{{ $question->question_id }}">
                                <option selected disabled>Choose here</option>
                                @foreach ($question->answer as $answer)
                                <option select="{{$answer->answer_text}}">{{$answer->answer_text}}</option>
                                @endforeach
                            </select>
                     @elseif ($question->question_type == "RADIO")       
                           <div class="col-sm-8">
                                <div class="form-check">
                                    @foreach ($question->answer as $answer)
                                    <div class="col-sm-12">
                                        <label class="form-check-label">
                                            <input type="radio" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}" class="form-check-input">   {{ $answer->answer_text }}
                                        </label>
                                    </div>
                                    @endforeach
        
                                </div><!-- form-check-->
                    @elseif ($question->question_type == "CHECKBOX")       
                           <div class="col-sm-8">
                                <div class="form-check">
                                    @foreach ($question->answer as $answer)
                                    <div class="col-sm-12">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}">   {{ $answer->answer_text }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div><!-- form-check-->
                    @endIf
                    
                    </div><!-- answer div -->
                    </div><!-- form-group -->
                    
                    </div><!-- ibox-content -->
                    </div><!-- ibox -->
                
                @endforeach
            </form>
             <div class="form-group">
               <div class="col-md-3 col-md-offset-9">
                   <a href="{{ url('/tip/previous') }}" class="btn btn-lg btn-block btn-primary">Go Back</a>
               </div>
            </div> <!-- form-group --> 
            <br><br><br><br>

         </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
