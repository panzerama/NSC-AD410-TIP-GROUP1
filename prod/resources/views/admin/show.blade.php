@extends('layouts.admin-app')

@section('title', 'Inactivate User')

@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <h2>Inactivate User</h2>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                  <h5>Enter the email address of the user to inactivate</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                               <label class="col-sm-2 control-label">Email</label>
                               <div class="col-sm-8">
                                   <input type="email" required class="form-control" name="email">
                               </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                               <div class="col-sm-3 col-md-offset-9">
                                   <button class="btn btn-lg btn-block btn-primary" value="add" name="add" type="submit">Inactivate User</button>
                               </div>
                           </div><!--form-group-->
                    </form>
                </div>
            </div><!-- ibox -->
        </div><!-- col-lg-12 -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
