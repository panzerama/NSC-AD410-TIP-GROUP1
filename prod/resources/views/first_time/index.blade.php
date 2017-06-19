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
                                  <p>If this information is incorrect, please contact the admin <a href="{{ url('/contact') }}">HERE</a>.</p>
                                </div>
                                
                            @foreach($faculty as $fac)
                                 
                            @endforeach
                        
                            <div class="ibox-content">
                                <form class="form-horizontal" method="POST" action="{{ route('firstTimeStore')}}">
                                    {{ csrf_field() }}
                                    
                                    <input type="hidden" name="faculty_id" value="{{ $fac->faculty_id }}">
                                    
                                    <div class="form-group">
                                       <label class="col-sm-2 control-label">Name</label>
                                       <div class="col-sm-8">
                                           <input type="text" readonly="readonly" class="form-control" name="name" value="{{ $fac->faculty_name }}">
                                       </div>
                                   </div>
                                      
                                       
                                   
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label">Email</label>
                                           <div class="col-sm-8">
                                               <input type="email" readonly="readonly" class="form-control" name="email" value="{{ $fac->email }}">
                                               
                                           </div>
                                   </div>
                                    
                                    <!--TO DO: populate divisions with list-->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Division</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="division_id">
                                                    <option selected disabled>Choose one..</option>
                                                    @foreach($divisions as $division) 
                                                        <option value="{{ $division->division_id }}">{{ $division->abbr }}</option>
                                                    @endforeach
                                                </select>
                                            </div><!--col-sm-8-->
                                    </div><!--form-group-->
                                    
                        
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Employee Type</label>
                                    <div class="col-sm-8">
                                        <select required class="form-control" name="employee_type">
                                            <option selected disabled>Choose one..</option>
                                            <option value="FULLTIME">Full-Time</option>
                                            <option value="PARTTIME">Part-Time</option>
                                        </select>
                                    </div><!--col-sm-8-->
                                </div><!--form-group-->
                                    
                                    
                                    <div class="form-group">
                                       <div class="col-sm-offset-9">
                                           <button class="btn btn-block btn-lg btn-primary" name="submit" value="submit" type="submit">Continue</button>
                                       </div>
                                   </div>
                                    
                                </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
    
    
    
@endsection
