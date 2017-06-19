@extends('layouts.admin-app')

@section('title', 'Admin Management')

@section('content')
{{--
<div class="row wrapper border-bottom white-bg page-heading">
    <h2 class="pull-left"><i class="fa fa-th"></i>Admin Management</h2>
</div>
<div class="wrapper wrapper-content"> 
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#active">Active Faculty</a></li>
                <li><a data-toggle="tab" href="#inactive">Inactive Faculty</a></li>
                <li><a data-toggle="tab" href="#add">Add Faculty</a></li>
                <li><a data-toggle="tab" href="#admins">Current Admins</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="active" class="ibox float-e-margins tab-pane fade in active">
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Change Status</th>
                        <th>Admin</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($faculty as $Singlefaculty)
                            @if($Singlefaculty->is_active)
                                <tr>
                                    <td>{{ $Singlefaculty->faculty_name }}</td>
                                    <td>{{ $Singlefaculty->email }}</td>
                                    <td><a href="{{ url('/admin/update') }}/{{ $Singlefaculty->faculty_id }}/active" class="btn btn-primary">Make Inactive</button></td>
                                    @if(!$Singlefaculty->is_admin)
                                    <td><a href="{{ url('/admin/update') }}/{{ $Singlefaculty->faculty_id }}/addadmin" class="btn btn-primary">Make Admin</button></td>
                                    @elseif($Singlefaculty->is_admin)
                                    <td><a href="{{ url('/admin/update') }}/{{ $Singlefaculty->faculty_id }}/removeadmin" class="btn btn-primary">Remove Admin Status</button></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
        <div id="inactive" class="ibox float-e-margins tab-pane fade in">
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
            </div>
        </div>
        <div id="add" class="ibox float-e-margins tab-pane fade in">
            <div class="ibox-content">
                <h4>Fill out form & submit to add a faculty member. Check 'Make Admin' to give faculty member admin privileges. </h4>
                <br><br>
                <form class="form-horizontal" action="{{ route('adminStore')}}" method="POST">
                    
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" required class="form-control" name="name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" required class="form-control" name="email">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Division</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="division">
                                <option selected disabled>Choose division..</option>
                                @foreach($divisions as $division) 
                                    <option select="{{ $division->abbr }}">{{ $division->abbr }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Employee Type</label>
                        <div class="col-sm-8">
                            <select required class="form-control" name="employee_type">
                                <option selected disabled>Choose one..</option>
                                <option value="FULLTIME">Full-Time</option>
                                <option value="PARTTIME">Part-Time</option>
                            </select>
                        </div>
                    </div>

                    <br><br>
                    
                    <div class="form-group">
                        <label class="col-sm-offset-3">Would you like to give this user admin privileges?</label>
                        <br><br>
                        <div class="col-sm-8 col-sm-offset-2">
                            <select required class="form-control" name="status">
                                <option selected>No</option>
                                <option>Yes, give this user admin privileges</option>
                            </select>
                        </div>
                    </div>
                    
                    <br><br>
                    
                    <div class="form-group">
                        <div class="col-sm-3 col-md-offset-9">
                            <button class="btn btn-lg btn-block btn-primary" value="add" name="add" type="submit">Add Faculty</button>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
        <div id="admins" class="ibox float-e-margins tab-pane fade in">
            <div class="ibox-content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($faculty as $Singlefaculty)
                            @if($Singlefaculty->is_admin && $Singlefaculty->is_active)
                                <tr>
                                    <td>{{ $Singlefaculty->faculty_name }}</td>
                                    <td>{{ $Singlefaculty->email }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
--}}
@endsection
