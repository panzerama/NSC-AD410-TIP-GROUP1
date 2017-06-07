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
              <li><a data-toggle="tab" href="#inactive">Add Faculty</a></li>
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
            
            <div class="tab-content">
                <div id="inactive" class="ibox float-e-margins tab-pane fade in inactive">
                    <div class="ibox-content">
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
                       <br><br>
                       
                
                       <br><br>
                       <div class="form-group">
                           <div class="col-sm-3 col-md-offset-9">
                               <button class="btn btn-lg btn-block btn-primary" value="add" name="add" type="submit">Add Admin</button>
                           </div>
                       </div><!--form-group-->
                        
                    </form>
                    </div><!-- ibox -content -->
                </div><!-- ibox -->
            
            
        </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
