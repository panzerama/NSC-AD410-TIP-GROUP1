@extends('layouts.admin-app')

@section('title', 'Faculty List')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                        @foreach($faculty as $Singlefaculty)
                            @if($Singlefaculty->faculty_id == $id)
                                <p>{{ $Singlefaculty->faculty_name }}'s status has been changed to {{ $status }}</p>
                            
                            @endif
                        @endforeach
                </div><!-- ibox -content -->
            </div><!-- ibox -->
            
        </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
