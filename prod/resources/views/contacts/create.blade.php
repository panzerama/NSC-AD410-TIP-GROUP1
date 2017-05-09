@extends('layouts.app')

@section('title', 'Contact Admin')

@section('content')

<!-- Contact Admin page for TIP User - url 'contact' -->

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            
            <!-- start form --> 
            <form class="form-horizontal">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h2> Contact Admin</h2>
                        <small>Fill out form to message the Admin</small>
                    </div>
                    <div class="ibox-content">
                           
                           <div class="form-group">
                               <label class="col-lg-2 control-label">Email</label>
                               <div class="col-lg-9">
                                   <input type="email" placeholder="Email" class="form-control">
                               </div>
                           </div>
                           
                           <div class="form-group">
                               <label class="col-lg-2 control-label">Subject</label>
                               <div class="col-lg-9">
                                   <input type="text" class="form-control">
                               </div>
                           </div>
                           
                           <div class="form-group">
                           <label class="col-lg-2 control-label">Message</label>
                           <div class="col-lg-9">
                                   <textarea rows="5" placeholder="Enter your message" class="form-control"></textarea>
                               </div>
                           </div>
                    </div><!-- ibox-content -->
                </div><!-- ibox -->
                
                <div class="form-group">
                   <div class="col-sm-3 col-md-offset-9">
                       <button class="btn btn-lg btn-block btn-primary" type="submit">SEND</button>
                   </div>
                </div>
            </form>
            
        </div><!-- col-lg-12  -->
    </div><!-- row -->
</div><!-- wrapper -->
@endsection
