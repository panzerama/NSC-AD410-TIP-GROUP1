@extends('layouts.admin-app')

@section('title', 'Completed TIP')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <h2>Previous TIP</h2> 
            <br><br>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Type Type</th>
                        <th>Division</th>
                        <th>Course</th>
                        <th>Quarter</th>
                        <th>Year</th>
                    </tr>
                    </thead>
                    <tbody>
            
                        @foreach ($previous_tips_query as $tip)
                            @if($tip->question_number < 6)
                                <td>{{$tip->question_answer}}</td>
                            @endif
                        @endforeach  
                    </tbody>
                    </table>
                    <br><br>
            
                @foreach ($previous_tips_query as $tip)
                @if($tip->question_number > 6)
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5 style="font-size:1.2em">{{$tip->question_text}}</h5>
                        </div><!-- ibox title-->    
                        <div class="ibox-content">
                            <div class="form-group">
                            {{$tip->question_answer}}
                            </div>
                        </div><!-- ibox-content -->
                    </div><!-- ibox -->
                    <br><br>
                 @endif
                @endforeach          
                <div class="form-group">
                    <div class="col-md-3">
                           <a href='{{ url("/reports") }}' class="btn btn-lg btn-block btn-warning" type="submit">Back</a>
                    </div>
                </div>
                <br><br><br><br>
         </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
