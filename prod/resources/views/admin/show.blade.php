@extends('layouts.admin-app')

@section('title', 'Faculty List')

@section('content')

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <h2>Faculty List</h2>
            <br>
            <ul class="nav nav-tabs">
              <li class="active"><a data-toggle="tab" href="#active">Active Faculty</a></li>
              <li><a data-toggle="tab" href="#inactive">Inactive Faculty</a></li>
            </ul>

            <div class="tab-content">
                <div id="active" class="ibox float-e-margins tab-pane fade in active">
                    <div class="ibox-content">
                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Change Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($faculty as $Singlefaculty)
                                    @if(!$Singlefaculty->is_admin && $Singlefaculty->is_active)
                                        <tr>
                                            <td>{{ $Singlefaculty->faculty_name }}</td>
                                            <td>{{ $Singlefaculty->email }}</td>
                                            <td><a href="{{ url('/admin/update') }}/{{ $Singlefaculty->faculty_id }}/active" class="btn btn-primary">Make Inactive</button></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- ibox -content -->
                </div><!-- ibox -->
                
                 <div id="inactive" class="ibox float-e-margins tab-pane fade in inactive">
                    <div class="ibox-content">
                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Change Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($faculty as $Singlefaculty)
                                    @if(!$Singlefaculty->is_admin && !$Singlefaculty->is_active)
                                        <tr>
                                            <td>{{ $Singlefaculty->faculty_name }}</td>
                                            <td>{{ $Singlefaculty->email }}</td>
                                            <td><a href="{{ url('/admin/update') }}/{{ $Singlefaculty->faculty_id }}/inactive" class="btn btn-primary">Make Active</button></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- ibox -content -->
                </div><!-- ibox -->
            </div><!-- tab-content-->
        </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
