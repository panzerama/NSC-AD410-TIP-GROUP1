<?php $__env->startSection('title', 'TIPS Submission'); ?>

<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                  <h2> TIPS Submission</h2>  
                                </div>
                        
                        
                            <form>
                                <div class="form-group">
                                    <label class="col-lg-10 control-label">1. Is this an individual TIP or a group TIP?</label>
                                        <div class="col-lg-10">
                                            <label class="radio-inline">
                                                <input type="radio" value="individual" id="inlineRadio1">
                                                Individual
                                                </label>   
                                            <label class="radio-inline">
                                                <input type="radio" value="group" id="inlineRadio2">
                                                Group
                                                </label>     
                                    </div>
                            </div>
                            
                            
                            <!--populate divisions with list-->
                            <div class="form-group">
                                <label class="col-lg-10 control-label">2. What is your division?</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="division">
                                            <option>ACCT</option>
                                            <option>ABE</option>
                                            <option>AME</option>
                                            <option>ASL</option>
                                            
                                        </select>
                                    </div>
                            </div>
                            
                            <!--get text boxes to display inline-->
                            <form role="form" class="form-inline">
                                <div class="form-group">
                                
                                <label class="col-lg-10 control-label">3. Enter your course information</label>
                                <label for="division" class="sr-only">Course Prefix</label>
                                <input type="text" placeholder="Enter course prefix" id="division" class="form-control">
                                </div>
                                <div class="form-group">
                                <label for="division" class="sr-only">Course Number</label>
                                <input type="text" placeholder="Enter course number" id="division" class="form-control">
                                </div>
                            </div>
                            </form>
                            
                            <div class="form-group">
                                <label class="col-lg-10 control-label">4. TIPS time period</label>
                                <label class="col-lg-10 control-label">Select Quarter</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="quarter">
                                            <option>Spring</option>
                                            <option>Summer</option>
                                            <option>Fall</option>
                                            <option>Winter</option>
                                            
                                        </select>
                                        <label class="col-lg-10 control-label">Select Year</label>
                                        <select class="form-control m-b" name="quarter">
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            
                                        </select>
                                        
                                    </div>
                            </div>
                            
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
    
    
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>