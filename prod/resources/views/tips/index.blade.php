@extends('layouts.app')

@section('title', 'TIPS Submission')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="col-sm-12">
                            <h1>TIPS Submission</h1>
                            <div class="tip-instructions">
                                <p>As you prepare to record a tip in this shell, please be thinking about the following pieces of information. Most of the pieces you can fill in even before you implement your change. In fact, some faculty have found it helpful to do so. The last items on the list can be entered only after you have implemented and evaluated your change.</p>
                                <ul>
                                    <li>The issue that you became aware of that suggested students were not achieving a course objective</li>
                                    <li>The course objective(s) and Essential Learning Outcome that relate to this issue</li>
                                    <li>Evidence of the issue (how did you know?)</li>
                                    <li>A description of the impact of the change(s) on student learning (or lack of impact)</li>                               
                                    <li>Your conclusions about the process and next steps.</li>
                                </ul>
                                <p><strong>NOTE: </strong>If you don't finish at one sitting, you can return to your TIP later. Select the "Save Draft" button to save your tip and it will automatically be resumed the next time you log in. Once you select "Submit" you cannot return to it! </p>
                                <a class="hide-instructions"><span class="glyphicon glyphicon-chevron-up"></span>Hide Instructions</a>
                                <br><br>
                            </div><!--tip-instructions-->
                            <div style="display:none" id="show-instructions">
                                <a class="show-instructions"><span class="glyphicon glyphicon-chevron-down"></span>Show Instructions</a>
                                <br><br>
                            </div>
                        </div><!--col-sm-12-->
                        
                        
                        <!--start form-->
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label>Is this an individual or group TIP?</label>
                                        </div>
                                    
                                        <div class="col-md-3">
                                          <label>
                                              
                                            <input class="form-check-input" type="radio" id="indy-select" value="individual" name="type-tip">
                                            Individual
                                            
                                          </label>
                                          
                                        </div>
                                        <div class="col-md-3">
                                          <label>
                                              
                                            <input class="form-check-input" type="radio" id="group-select" value="group" name="type-tip">
                                            Group
                                            
                                          </label>
                                          
                                        </div>
                                    </div>
                                    
                                    
                                    <!--Only displays when user selects Group Tip radio option-->
                                    <div style="display:none" id="group-tip">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <label class="col-sm-12">Enter the name of additional TIP member</label>
                                        <small class="col-sm-12">Click Add Another Member to enter more than one member</small>
                                        </div>
    
                                    </div>
                                    
                                    <!--jquery function will add fields when user clicks 'Add Another Member'-->
                                    <div class="form-group">
                                        <div class="col-md-12 add-member-field-div">
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" name="tip-members[]">
                                            </div>
                                            <div class="col-md-7">
                                                <a href="#" class="add-tip-member"><span class="glyphicon glyphicon-plus"></span> Add Another Member</a>
                                            </div>
                                            <br><br><br>
                                       </div>
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
                                    </div><!-- ibox-content -->
                        </div><!--ibox-->

                                    <br><br>
                                   <div class="form-group">
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-warning" type="submit">Cancel</button>
                                       </div>
                                       <div class="col-md-3">
                                        </div>
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-secondar" type="submit">Save Draft</button>
                                       </div>
                                       <div class="col-sm-3">
                                           <a href="{{ url('/tip/questions') }}" class="btn btn-lg btn-block btn-primary">Continue</a>
                                       </div>
                                   </div><!--form-group-->
                                    
                                </form>
                                <br><br><br><br>
                           
                    </div><!-- col-lg-12 -->
                </div><!--row-->
            </div><!--wrapper-->
           
            <script>
                $(document).ready(function(){
                    
                    //TIP Questionnaire            
                    // hide or show TIP instructions based on user clicks
                    $(".hide-instructions").click(function(){
                        $("#show-instructions").slideDown();
                        $(".tip-instructions").slideUp("slow");
                    });
                    $(".show-instructions").click(function(){
                        $("#show-instructions").hide();
                        $(".tip-instructions").slideDown("slow");
                    });
                    
                    //hide or show field to add more more members to TIP based on if user clicks group or indy radio option
                    $("#group-select").click(function(){
                        $("#group-tip").slideDown();
                    });
                     $("#indy-select").click(function(){
                        $("#group-tip").slideUp();
                    });
                    //Adds field to when user clicks 'Add Another Member' / Removes field when user clicks 'remove'
                    var max_fields      = 10; //maximum input boxes allowed
                    var wrapper         = $(".add-member-field-div"); //Fields wrapper
                    var add_member      = $(".add-tip-member"); //Add button ID
                    
                    var x = 1; //initlal text box count
                    $(add_member).click(function(e){ //on add input button click
                        e.preventDefault();
                        if(x < max_fields){ //max input box allowed
                            x++; //text box increment
                            $(wrapper).append('<div class="col-sm-5 field"><br><input class="form-control type="text" name="tip-members[]"/><a href="#" class="remove_field"><br><span class="glyphicon glyphicon-minus"></span>  Remove</a></div>'); //add input box
                        }
                    });
                    
                    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                        e.preventDefault(); 
                        $(this).parent('div').remove();
                        x--;
                    })
                
                });
                
            </script>
            
@endsection