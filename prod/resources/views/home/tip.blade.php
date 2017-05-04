@extends('layouts.app')

@section('title', 'TIPS Submission')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>TIPS Submission</h1>
                        <p>As you prepare to record a tip in this shell, please be thinking about the following pieces of information. Most of the pieces you can fill in even before you implement your change. In fact, some faculty have found it helpful to do so. The last items on the list can be entered only after you have implemented and evaluated your change.</p>
                        <ul>
                            <li>The issue that you became aware of that suggested students were not achieving a course objective</li>
                            <li>The course objective(s) and Essential Learning Outcome that relate to this issue</li>
                            <li>Evidence of the issue (how did you know?)</li>
                            <li>A description of the impact of the change(s) on student learning (or lack of impact)</li>                               
                            <li>Your conclusions about the process and next steps.</li>
                        </ul>
                        <p>NOTE: If you don't finish at one sitting, you can return to your TIP later. Select the save button to save your tip and it will automatically be resumed the next time you log in. Once you choose "Submit" you cannot return to it! </p><br>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                    
                                
                                    <div class="form-group">
                                        <label class="col-sm-2 col-md-2 control-label">Is this an individual or group TIP?</label>
                                        <div class="col-md-6">
                                          <label>
                                              
                                            <input class="form-check-input" type="radio" name="Individual">
                                            Individual
                                            
                                          </label>
                                          
                                        </div>
                                        <div class="col-md-6">
                                          <label>
                                              
                                            <input class="form-check-input" type="radio" name="group">
                                            Group
                                            
                                          </label>
                                          
                                        </div>
                                    </div>
                                    
                    
                                    
                                    

                                    
                                    <div class="hr-line-dashed"></div>
                                    
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
                                    
                                    <div class="hr-line-dashed"></div>
                                    
                                    
                                        <div class="form-group">
                                           <label class="col-sm-2 control-label">Enter Course Prefix</label>
                                           <div class="col-sm-8">
                                               <input type="text" class="form-control" name="course-prefix">
                                           </div>
                                       </div>
                                       
                                       <div class="form-group">
                                           <label class="col-sm-2 control-label">Enter Course Number</label>
                                           <div class="col-sm-8">
                                               <input type="text" class="form-control" name="course-number">
                                           </div>
                                       </div>

                                       <div class="hr-line-dashed"></div>
                                       
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Select Quarter</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="quarter">
                                                    <option>Fall</option>
                                                    <option>Winter</option>
                                                    <option>Spring</option>
                                                    <option>Summer</option>
                                                </select>
                                            </div><!--col-sm-8-->
                                    </div><!--form-group-->
                                    
                                    <!--TO DO: populate year with list-->
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Select Year</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="year">
                                                    <option>2017</option>
                                                    <option>2018</option>
                                                    <option>2019</option>
                                                </select>
                                            </div><!--col-sm-8-->
                                    </div><!--form-group-->
                                       
                                   
                                   
                                    
                                    
                                    <br>
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
