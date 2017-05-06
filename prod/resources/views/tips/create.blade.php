@extends('layouts.app')

@section('title', 'TIPS Submission')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-sm-12">
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
                                <p>NOTE: If you don't finish at one sitting, you can return to your TIP later. Select the save button to save your tip and it will automatically be resumed the next time you log in. Once you choose "Submit" you cannot return to it! </p>
                                <a class="hide-instructions"><span class="glyphicon glyphicon-chevron-up"></span>Hide Instructions</a>
                                <br><br>
                            </div><!-- tip-instructions -->
                            <div style="display:none" id="show-instructions">
                                <a class="show-instructions"><span class="glyphicon glyphicon-chevron-down"></span>Show Instructions</a>
                                <br><br>
                            </div>
                        </div><!-- col-sm-12 -->
                        
                        <?php
                            $questions = array(
                                array("What is the problem or lesson that you identified
                                    and will be discussing in this TIP? No topic is too big or too small. All are welcomed!", "textarea"),
                                array("Which of the following best 
                                    describes the evidence you found for the problem?", "radio"),
                                array("Which of the college-wide Essential Learning
                                    Outcomes does your TIP most closely address?", "dropdown"),
                                array("What is the problem or lesson that you identified
                                    and will be discussing in this TIP? No topic is too big or too small. All are welcomed!", "textarea"),    
                                );
                        
                            
                            
                            $dropDownOptions = ["Communication and self-expression", "Technological proficiency" , "Quantitative reasoning"];
                            
                            $radioOptions = ["Communication and self-expression", "Technological proficiency" , "Quantitative reasoning"];
                        
                        ?>
                        
                        
                                <form class="form-horizontal">
                                    
                                    <?php 
                                    
                                        for ($i = 0; $i < count($questions); $i++) {
                                            echo 
                                            '<div class="ibox float-e-margins">
                                            <div class="ibox-title"><h3>' . $questions[$i][0] . '</h3></div>
                                            <div class="ibox-content">
                                            <div class="form-group">
                                            <div class="col-sm-12">';
                                            $questionType = $questions[$i][1];    
                                            switch ($questionType) {
                                                
                                                case "textarea":
                                                    echo '<textarea class="form-control" rows="4" cols="60"></textarea>';
                                                    break;
                                                    
                                                case "dropdown":
                                                    echo '<select class="form-control col-sm-6" name="dropdown-select">';
                                                    foreach($dropDownOptions as $option){
                                                        echo '<option value=' . $option . '>' . $option .'</option>';
                                                    }
                                                    echo '</select>';
                                                    break;
                                                    
                                                case "radio":
                                                    foreach($radioOptions as $option){
                                                        echo '
                                                        <div class="form-check">
                                                        <label class="form-check-label">
                                                        <input type="radio" class="form-check-input" name="radio-select">    ' . $option . 
                                                        '</label>
                                                        </div><!-- form-check-->';
                                                    }
                                            }
                                            echo '
                                            </div><!-- col-sm-12 -->
                                            </div><!-- form-group -->
                                            </div><!-- i-box-content -->
                                            </div><!-- i-box -->
                                            ';
                                            
                                        }
                                    
                                    ?>
                                    
                                    
                                    <br><br>
                                   <div class="form-group">
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-warning" type="submit">Cancel</button>
                                       </div>
                                       <div class="col-md-3">
                                        </div>
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-#5E5E5E" type="submit">Save Draft</button>
                                       </div>
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-primary" type="submit">Submit</button>
                                       </div>
                                   </div>
                                </form>
                                <br><br><br><br>
                            
                                
                        
                        
        
                        
                        
                    
                </div><!--col-lg-12-->
            </div><!--row-->
        </div><!--wrapper-->
        
        <script>
            $(document).ready(function(){
                    
                // hide or show TIP instructions based on user clicks
                $(".hide-instructions").click(function(){
                    $("#show-instructions").slideDown();
                    $(".tip-instructions").slideUp("slow");
                });
                $(".show-instructions").click(function(){
                    $("#show-instructions").hide();
                    $(".tip-instructions").slideDown("slow");
                });
             });
        </script>
    
    
@endsection
