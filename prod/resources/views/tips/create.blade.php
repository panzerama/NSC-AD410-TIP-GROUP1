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
                                    and will be discussing in this TIP?", 
                                    "textarea", 
                                    "Ut sed tortor eu nulla dapibus interdum id sed ante. Praesent in velit odio. Quisque iaculis tincidunt est, id suscipit odio elementum id. Mauris tempus turpis dapibus, iaculis neque quis, imperdiet quam. Quisque sit amet fringilla quam. Mauris faucibus mattis porttitor. Fusce et bibendum felis, sed tempus odio. Maecenas accumsan risus sit amet neque euismod, ut elementum tellus lobortis. Donec vitae ipsum ut massa iaculis hendrerit. Nulla non lacus ante. Ut aliquam ex vel facilisis pulvinar."),
                                array("Which of the following best 
                                    describes the evidence you found for the problem?", 
                                    "radio", 
                                    "Ut sed tortor eu nulla dapibus interdum id sed ante. Praesent in velit odio. Quisque iaculis tincidunt est, id suscipit odio elementum id. Mauris tempus turpis dapibus, iaculis neque quis, imperdiet quam. Quisque sit amet fringilla quam. Mauris faucibus mattis porttitor. Fusce et bibendum felis, sed tempus odio. Maecenas accumsan risus sit amet neque euismod, ut elementum tellus lobortis. Donec vitae ipsum ut massa iaculis hendrerit. Nulla non lacus ante. Ut aliquam ex vel facilisis pulvinar."),
                                array("Which of the college-wide Essential Learning
                                    Outcomes does your TIP most closely address?",
                                    "dropdown", 
                                    "Ut sed tortor eu nulla dapibus interdum id sed ante. Praesent in velit odio. Quisque iaculis tincidunt est, id suscipit odio elementum id. Mauris tempus turpis dapibus, iaculis neque quis, imperdiet quam. Quisque sit amet fringilla quam. Mauris faucibus mattis porttitor. Fusce et bibendum felis, sed tempus odio. Maecenas accumsan risus sit amet neque euismod, ut elementum tellus lobortis. Donec vitae ipsum ut massa iaculis hendrerit. Nulla non lacus ante. Ut aliquam ex vel facilisis pulvinar."),
                                array("What is the problem or lesson that you identified
                                    and will be discussing in this TIP? No topic is too big or too small. All are welcomed!", 
                                    "textarea", 
                                    "Ut sed tortor eu nulla dapibus interdum id sed ante. Praesent in velit odio. Quisque iaculis tincidunt est, id suscipit odio elementum id. Mauris tempus turpis dapibus, iaculis neque quis, imperdiet quam. Quisque sit amet fringilla quam. Mauris faucibus mattis porttitor. Fusce et bibendum felis, sed tempus odio. Maecenas accumsan risus sit amet neque euismod, ut elementum tellus lobortis. Donec vitae ipsum ut massa iaculis hendrerit. Nulla non lacus ante. Ut aliquam ex vel facilisis pulvinar."),    
                                );
                        
                            
                            
                            $dropDownOptions = ["Communication and self-expression", "Technological proficiency" , "Quantitative reasoning"];
                            
                            $radioOptions = ["Communication and self-expression", "Technological proficiency" , "Quantitative reasoning"];
                        
                        ?>
                        
                        
                                <form class="form-horizontal">
                                    
                                    <?php 
                                    
                                        for ($i = 0; $i < count($questions); $i++) {
                                            echo 
                                            '<div class="ibox float-e-margins">
                                            <div class="ibox-title">
                                                
                                                    <h3 style="font-size:1.6em">' . $questions[$i][0] . '</h3>
                                                
                                                
                                                
                                            </div><!-- ibox title-->    
                                            <div class="ibox-content">
                                            <div class="form-group">
                                            
                                            ';
                                            $questionType = $questions[$i][1];    
                                            switch ($questionType) {
                                                
                                                case "textarea":
                                                    echo '
                                                    <div class="col-lg-8 col-sm-12">
                                                            <textarea class="form-control" rows="4" cols="60"></textarea>';
                                                    break;
                                                    
                                                case "dropdown":
                                                    echo '
                                                    <div class="col-sm-4">
                                                    <select class="form-control" name="dropdown-select">';
                                                    foreach($dropDownOptions as $option){
                                                        echo '<option value=' . $option . '>' . $option .'</option>';
                                                    }
                                                    echo '</select>';
                                                    break;
                                                    
                                                case "radio":
                                                    echo '<div class="col-sm-8">';
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
                                            </div><!-- answer div -->
                                            <div class="col-md-1 pull-right">
                                                <div class="ibox-tools">
                                                    <a href="#" data-toggle="popover" title="Example Answer" data-trigger="focus" data-placement="left" data-content="' . $questions[$i][2] . '"><span style="font-size:1.5em;" class="glyphicon glyphicon-question-sign"></span></a>
                                                </div><!-- ibox tools -->
                                            </div> <!-- col-md-1 -->   
                                            </div><!-- form-group -->
                                            </div><!-- ibox-content -->
                                            </div><!-- ibox -->
                                            ';
                                            
                                        }
                                    
                                    ?>
                                    
                                    
                                    <br><br>
                                   <div class="form-group">
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-warning" type="submit">Cancel</button>
                                       </div>
                                       <div class="col-md-3">
                                           <a href="{{ url('/tip/questions') }}" class="btn btn-lg btn-block btn-warning">Back</a>
                                        </div>
                                       <div class="col-md-3">
                                           <button class="btn btn-lg btn-block btn-secondary" type="submit">Save Draft</button>
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
                
                //For example answer popup
                $('[data-toggle="popover"]').popover();
             });
        </script>
    
    
@endsection
