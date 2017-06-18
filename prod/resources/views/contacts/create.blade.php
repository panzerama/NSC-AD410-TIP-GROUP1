@extends('layouts.app')

@section('title', 'Contact Admin')

@section('content')

<!-- Contact Admin page for TIP User - url 'contact' -->

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <h1> Contact Admin</h1>
            <!-- start form --> 
            <form method="POST" action="/contact" class="form-horizontal">
                {{ csrf_field() }}
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <small>Fill out form to message the Admin</small>
                    </div>
                    <div class="ibox-content">
                        
                            <div class="form-group">
                               <label class="col-lg-2 control-label">Email</label>
                               <div class="col-lg-9">
                                   <input type="text" placeholder="Name" class="form-control" name="name" value="{{ $name }}" required>
                               </div>
                           </div>
                           
                           <div class="form-group">
                               <label class="col-lg-2 control-label">Email</label>
                               <div class="col-lg-9">
                                   <input type="email" placeholder="Email" class="form-control" name="email" value="{{ $email }}" required>
                               </div>
                           </div>
                           
                           <div class="form-group">
                               <label class="col-lg-2 control-label">Topic</label>
                               <div class="col-lg-9">
                                   <input type="text" class="form-control" required name="topic">
                               </div>
                           </div>
                           
                           <div class="form-group">
                           <label class="col-lg-2 control-label">Message</label>
                           <div class="col-lg-9">
                                   <textarea rows="5" placeholder="Enter your message" class="form-control" name="body" required></textarea>
                               </div>
                           </div>
                           
                            @if(!empty($result))
                            <br><br>
                           <div class="form-group">
                               <div class="alert alert-success alert-dismissable col-md-10 col-md-offset-1 text-center">
                                   <h3><strong>Your message has been sent! Thank you.</strong></h3>
                               </div>
                           </div>
                           @endif
                           
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
