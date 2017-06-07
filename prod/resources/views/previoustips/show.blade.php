@extends('layouts.app')

@section('title', 'Previous TIP')

@section('content')



<div class="wrapper wrapper-content animated fadeInRight">
    @foreach ($previous_tips_query as $tip)
        <h5> question: {{$tip->question_text}} answer: {{$tip->question_answer}} </h5>
    @endforeach
    <div class="row">
        <div class="col-lg-12">
            <h2>Previous TIP</h2> 
                
                <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer</th>
                        </tr>
                        </thead>
                        <tbody>
                            
                        
                            <tr>
                                <td>1</td>
                                <td>Spring</td>
                            </tr>
                        
                        </tbody>
                    </table>
                </div><!-- ibox-content -->
                
            </div><!-- ibox -->

         </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
