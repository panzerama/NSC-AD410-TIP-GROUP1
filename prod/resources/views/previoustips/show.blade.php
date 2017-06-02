@extends('layouts.app')

@section('title', 'Previous TIP')

@section('content')

@php

@endphp

<div class="wrapper wrapper-content animated fadeInRight">
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
                            
                        @foreach()
                            <tr>
                                <td>1</td>
                                <td>Spring</td>
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
