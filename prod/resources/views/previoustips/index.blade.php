@extends('layouts.app')

@section('title', 'View Previous TIPS')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
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
                         @foreach($tip_information as $tip)
                             @if($tip->completed == "in progress")
                                <tr class='clickable-row' data-href="{{ url('/tip') }}">
                             @else
                                 <tr class='clickable-row' data-href="{{ url('/tip/previous/') }}/{{$tip->tips_id}}">
                            @endif
                                <td>{{$tip->tips_id}}</td>
                                <td>{{$tip->quarter}}</td>
                                <td class="text-navy">{{$tip->year}}</td>
                                <td>{{$tip->question_answered}}</td>
                                <td class="text-navy">{{$tip->completed}}</td>
                                <td><span class="fa fa-chevron-right"></span></td>
                            </tr>
                        @endforeach
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
