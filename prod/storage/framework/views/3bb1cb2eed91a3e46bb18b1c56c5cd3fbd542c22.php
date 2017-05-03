<?php $__env->startSection('title', 'TIPS Submission'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>TIPS Submission</h1>
                        <div id="tip-instructions">
                        <p>As you prepare to record a tip in this shell, please be thinking about the following pieces of information. Most of the pieces you can fill in even before you implement your change. In fact, some faculty have found it helpful to do so. The last items on the list can be entered only after you have implemented and evaluated your change.</p>
                        <ul>
                            <li>The issue that you became aware of that suggested students were not achieving a course objective</li>
                            <li>The course objective(s) and Essential Learning Outcome that relate to this issue</li>
                            <li>Evidence of the issue (how did you know?)</li>
                            <li>A description of the impact of the change(s) on student learning (or lack of impact)</li>                               
                            <li>Your conclusions about the process and next steps.</li>
                        </ul>
                        <p>NOTE: If you don't finish at one sitting, you can return to your TIP later. Select the save button to save your tip and it will automatically be resumed the next time you log in. Once you choose "Submit" you cannot return to it! </p>
                        <a onclick="hideInstructions()"><span class="glyphicon glyphicon-chevron-up"></span>Hide Instructions</a>
                        </div>
                        <div style="display:none" id="show-instructions">
                            <a onclick="showInstructions()"><span class="glyphicon glyphicon-chevron-down"></span>Show Instructions</a>
                        </div>
                        <br><br>
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                    
                                
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="col-sm-12">Is this an individual or group TIP?</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2 col-md-offset-1">
                                          <label>
                                              
                                            <input class="form-check-input" type="radio" onclick="indyTip()" value="individual" name="type-tip">
                                            Individual
                                            
                                          </label>
                                          
                                        </div>
                                        <div class="col-md-5">
                                          <label>
                                              
                                            <input class="form-check-input" type="radio" onclick="groupTip()" value="group" name="type-tip">
                                            Group
                                            
                                          </label>
                                          
                                        </div>
                                    </div>
                                    <br>
                                    <div style="display:none" id="group-tip">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                        <label class="col-sm-12">Enter the name of additional TIP member</label>
                                        <small class="col-sm-12">Click Add Another to enter more than one member</small>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" name="course-prefix">
                                            </div>
                                            <div class="col-sm-5">
                                                <button class="btn btn-md" type="submit">Add Another</button>
                                            </div>
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
                                       
                                   
                                   
                                    
                                    
                                    <br>
                                    <div class="form-group">
                                       <div class="col-sm-offset-9">
                                           <a href="<?php echo e(url('/tip/tip-questions')); ?>" class="btn btn-lg btn-white" type="submit">Continue</a>
                                       </div>
                                       
                                   </div>
                                    
                                </form>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <script>
                function hideInstructions() {
                    document.getElementById('tip-instructions').style.display = "none";
                    document.getElementById('show-instructions').style.display = "block";
                }
                function showInstructions() {
                    document.getElementById('tip-instructions').style.display = "block";
                    document.getElementById('show-instructions').style.display = "none"
                }
                function groupTip() {
                        document.getElementById('group-tip').style.display = "block";
                    }
                function indyTip() {
                        document.getElementById('group-tip').style.display = "none";
                    }
            </script>
            
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>