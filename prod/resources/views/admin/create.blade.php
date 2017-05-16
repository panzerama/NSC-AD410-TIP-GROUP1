@extends('layouts.admin-app')

@section('title', 'Admin Management')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <h2>Admin Management</h2> 
            <br>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Active Admins</h5>  
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Jane</td>
                            <td>Doe</td>
                            <td class="text-navy">JaneDoe@seattlecolleges.edu</td>
                        </tr>
                        </tbody>
                    </table>
                </div><!--ibox-content-->
            </div><!-- ibox -->
            <br><br>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Add Admin</h5>  
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                           <label class="col-sm-2 control-label">First Name</label>
                           <div class="col-sm-8">
                               <input type="text" required class="form-control" name="first-name">
                           </div>
                       </div>
                       
                       <div class="form-group">
                           <label class="col-sm-2 control-label">Last Name</label>
                           <div class="col-sm-8">
                               <input type="text" required class="form-control" name="last-name">
                           </div>
                       </div>
                       <div class="form-group">
                           <label class="col-sm-2 control-label">Email</label>
                           <div class="col-sm-8">
                               <input type="email" required class="form-control" name="email">
                           </div>
                       </div>
                       <br><br>
                       <div class="form-group">
                           <div class="col-sm-3 col-md-offset-9">
                               <button class="btn btn-lg btn-block btn-primary" value="add" name="add" type="submit">Add Admin</button>
                           </div>
                       </div><!--form-group-->
                        
                    </form>
                </div><!--ibox-content-->
            </div><!-- ibox -->
        </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
