@extends('layouts.app')

@section('title', 'Contact Admin')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                       
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                  <h2> Contact Admin</h2>  
                                </div>
                                
                                
                                <div class="ibox-content">
                                    <form class="form-horizontal">
                                   <p>Fill out form to message the Admin</p>
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
                                   
                                   <div class="form-group">
                                       <div class="col-lg-offset-10">
                                           <button class="btn btn-lg btn-white" type="submit">SEND</button>
                                       </div>
                                       
                                   </div>
                                   </form>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
