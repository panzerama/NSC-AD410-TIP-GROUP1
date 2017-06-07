@extends('layouts.app')

@section('title', 'View Previous TIPS')

@section('content')

@php ($id = 1)

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        @foreach($tip_information as $tip)
            <h5>tips id: {{$tip->tips_id}}</h5>
            <h5>quarter: {{$tip->quarter}}</h5>
            <h5>year: {{$tip->year}}</h5>
            <h5>question_answer: {{$tip->question_answered}}</h5>
            <h5>completed: {{$tip->completed}}</h5>
        @endforeach
        <div class="col-lg-12">
            <h1>Previous TIPs</h1>
            <br>
            <div class="ibox float-e-margins">
                <div class="ibox-content">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Quarter</th>
                            <th>Year</th>
                            <th>Questions Answered</th>
                            <th>Completed</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class='clickable-row' data-href="{{ url('/tip/previous/') }}/{{ $id }}">
                            <td>1</td>
                            <td>Spring</td>
                            <td class="text-navy">2016</td>
                            <td>10</td>
                            <td class="text-navy">March 2, 2017</td>
                            <td><span class="fa fa-chevron-right"></span></td>
                        </tr>
                        <tr class='clickable-row' data-href="{{ url('/tip/previous/') }}/{{ $id }}">
                            <td>1</td>
                            <td>Winter</td>
                            <td class="text-navy">2015</td>
                            <td>12</td>
                            <td class="text-navy">March 2, 2017</td>
                            <td><span class="fa fa-chevron-right"></span></td>
                        </tr>
                        <tr class='clickable-row' data-href="{{ url('/tip/previous/') }}/{{ $id }}">
                            <td>1</td>
                            <td>Fall</td>
                            <td class="text-navy">2015</td>
                            <td>15</td>
                            <td class="text-navy">March 2, 2017</td>
                            <td><span class="fa fa-chevron-right"></span></td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- ibox-content -->
                
            </div><!-- ibox -->
        </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->

@endsection

@section('scripts')
<script>
    $( document ).ready(function() {
        $(".clickable-row").click(function() {
        window.location = $(this).data("href");
        });
    });
    
    
</script>
@endsection
