@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Welcome to TIPS</h2>
                        <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                  <h4>Please verify your infomation</h4> 
                                  <p>If this information is incorrect, please contact the admin <a href="#">HERE</a>.</p>
                                </div>
                        
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                        <div class="form-group">
                                           <label class="col-sm-2 control-label">First Name</label>
                                           <div class="col-sm-8">
                                               <input type="email" readonly="readonly" class="form-control" name="firstname">
                                           </div>
                                       </div>
                                       
                                       <div class="form-group">
                                           <label class="col-sm-2 control-label">Last Name</label>
                                           <div class="col-sm-8">
                                               <input type="email" readonly="readonly" class="form-control" name="lastname">
                                           </div>
                                       </div>
                                       
                                   
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label">Email</label>
                                           <div class="col-sm-8">
                                               <input type="email" readonly="readonly" class="form-control" name="email">
                                           </div>
                                   </div>
                                    
                                    
                                    
                                    <div class="ibox-title">
                                        
                                    </div>
                                    
                                    <!--TO DO: populate divisions with list-->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Division</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="division">
                                                    <option>ACCT</option>
                                                    <option>ABE</option>
                                                    <option>AME</option>
                                                    <option>ASL</option>
                                                </select>
                                            </div><!--col-sm-8-->
                                    </div><!--form-group-->
                                    
                        
                                      <br>
                                    <div class="form-group">
                                      <div class="col-sm-12">
                                        <div class="form-check col-sm-offset-3 col-sm-3">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="full-time" value="full-time">
                                            Full-time
                                          </label>
                                        </div>
                                        <div class="form-check col-sm-3">
                                          <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="part-time" value="part-time">
                                            Part-time
                                          </label>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                       <div class="col-sm-offset-9">
                                           <button class="btn btn-lg btn-white" type="submit">Continue</button>
                                       </div>
                                       
                                   </div>
                                    
                                </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
    
    
    
@endsection
