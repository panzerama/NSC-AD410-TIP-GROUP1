@extends('layouts.app')

@section('title', 'TIPS Submission')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
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
                        </div>
                        <div style="display:none" id="show-instructions">
                            <a class="show-instructions"><span class="glyphicon glyphicon-chevron-down"></span>Show Instructions</a>
                            <br><br>
                        </div>
                        
                        <?php
                        
                            $question = "What is the problem or lesson that you identified
                                    and will be discussing in this TIP? No topic is too big or too small. All are welcomed!";
                            $questionType = "radio";
                            
                            $dropDownOptionName = "essential_learning";
                            $dropDownOptions = ["Communication and self-expression", "Technological proficiency" , "Quantitative reasoning"];
                            
                            $radioOptionName = "Test Name";
                            $radioOptions = ["Communication and self-expression", "Technological proficiency" , "Quantitative reasoning"];
                        
                        ?>
                        
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                {{ $question }}
                            
                            
                                <div class="col-md-6">
                                <?php
                                    switch ($questionType) {
                                        
                                        case "textarea":
                                            echo '<textarea rows="4" cols="80">
                                            </textarea>';
                                            break;
                                        case "dropdown":
                                            echo '<select name="' . $dropDownOptionName . '">
                                                <option selected="selected" disabled>Please select from the drop-down</option>';
                                            foreach($dropDownOptions as $option){
                                                echo '<option value=' . $option . '>' . $option .'</option>';
                                            }
                                            break;
                                        case "radio":
                                            foreach($radioOptions as $option){
                                                echo '<input type="radio" name="' . $radioOptionName . '">' . $option;
                                            }
                                            
                                        
                                    }
                                
                                ?>
                                </div>
                                </form>
                            </div><!-- i-box-content -->
                        </div><!-- i-box -->
                                
                        
                        
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <form class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-8">What is the problem or lesson that you identified
                                    and will be discussing in this TIP? No topic is too big or too small. All are welcomed!</label>
                                        <div class="col-lg-10">
                                            <textarea rows="4" cols="80">
                                            </textarea>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                            
                                <div class="form-group">
                                    <label class="col-lg-8">What is the course-level objective that this TIP
                                    best addresses?</label>
                                        <div class="col-lg-10">
                                            <textarea rows="4" cols="80">
                                            </textarea>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Which of the college-wide Essential Learning
                                    Outcomes does your TIP most closely address?</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="essential_learning">
                                                <option>Please select from the drop-down</option>
                                                <option>Facts, theories, perspectives, and methodologies within and across disciplines
                                                </option>
                                                <option>Critical thinking and problem solving
                                                </option>
                                                <option>Communication and self-expression
                                                </option>
                                                <option>Quantitative reasoning
                                                </option>
                                                <option>Information literacy
                                                </option>
                                                <option>Technological proficiency
                                                </option>
                                                <option>Collaboration: group and team work
                                                </option>
                                                <option>Civic engagement: local, global, and environmental
                                                </option>
                                                <option>Intercultural knowledge and competence
                                                </option>
                                                <option>Ethical awareness and personal integrity
                                                </option>
                                                <option>Lifelong learning and personal well-being
                                                </option>      
                                                <option>Synthesis and application of knowledge, skills, 
                                                and responsibilities to new settings and problems
                                                </option>
                                            </select>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Which of the following best 
                                    describes the evidence you found for the problem?</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="evidence">
                                                <option>Please select from the drop-down</option>
                                                <option>Direct student feedback (e.g. written or 
                                                verbal communication with students, SGID, etc.)
                                                </option>
                                                <option>Student behavior (e.g. length of time 
                                                to complete a learning activity, number of 
                                                clarifying questions the students asked, etc.)
                                                </option>
                                                <option>	Student performance on a learning activity, 
                                                assignment, a quiz or exam, a skill demonstration, 
                                                oral presentation, etc.
                                                </option>
                                            </select>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Please describe more specifically 
                                    how you found the problem. For example, "Based on discussion posts, I realized
                                    that more than half of the class did not understand the prompt and was
                                    not demonstrating the kind of comprehension I was looking for."</label>
                                        <div class="col-lg-10">
                                            <textarea rows="4" cols="80">
                                            </textarea>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Please select the change that best 
                                    fits what you did to try to address the problem.</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="address_problem">
                                                <option>Please select from the drop-down</option>
                                                <option>Modified a learning activity
                                                </option>
                                                <option>Added new learning activity
                                                </option>
                                                <option>Provided more context or more practice
                                                </option>
                                                <option>Provided “real world” examples or applications
                                                </option>
                                                <option>Tried a new approach to the material
                                                </option>
                                                <option>Reapportioned time/effort devoted to topics
                                                </option>
                                                <option>Reviewed the material
                                                </option>
                                            </select>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Specifically, what did you do to address 
                                    the problem? For example, "I broke the prompt down into two separate discussions 
                                    so that it was clearer what the students should think about and write about in their 
                                    posts."</label>
                                        <div class="col-lg-10">
                                            <textarea rows="4" cols="80">
                                            </textarea>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Please select the evidence that best fits 
                                    how you assessed the impact of the change you made.</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="evidence_of_change">
                                                <option>Please select from the drop-down</option>
                                                <option>Direct student feedback (e.g. written or verbal communication 
                                                with students, SGID, etc.)
                                                </option>
                                                <option>Student behavior behavior (e.g. length of time to complete a learning, 
                                                activity, number of clarifying questions the students asked, etc.)
                                                </option>
                                                <option>Student performance on a learning activity, assignment, 
                                                a quiz or exam, a skill demonstration, oral presentation, etc.
                                                </option>
                                            </select>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">Please describe more fully how you assessed the impact 
                                    of the change you made. For example, "After I broke the prompt into two discussions, more 
                                    students were able to write about the ideas thoroughly. This time it was about 75% of students. 
                                    I might want to refine the prompts even further, but this was a good change."</label>
                                        <div class="col-lg-10">
                                            <textarea rows="4" cols="80">
                                            </textarea>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">What new opportunities did you consider as a result of 
                                    identifying this problem and making this change?</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" name="opportunities">
                                                <option>Please select from the drop-down</option>
                                                <option>Gave you an idea for additional changes to this course
                                                </option>
                                                <option>Gave you an idea for changes to another course
                                                </option>
                                                <option>Suggested a topic for discussion with colleagues in your 
                                                program/discipline
                                                </option>
                                                <option>Suggested a topic that an interdisciplinary group of faculty 
                                                could productively examine
                                                </option>
                                                <option>Prompted consideration of a sabbatical for more in-depth study
                                                </option>
                                                <option>Uncovered a topic for a faculty retreat
                                                </option>
                                            </select>
                                        </div>
                                </div>
                            <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-lg-8">What else would you like to share about the teaching 
                                    improvement process you engaged in this quarter?</label>
                                        <div class="col-lg-10">
                                            <textarea rows="4" cols="80">
                                            </textarea>
                                        </div>
                                </div>
                            <div class="form-group">
                                        <label class="col-lg-8">TIP data will be shared de-identified and 
                                        in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment 
                                        and professional development to use specifics of individual TIPs.</label>
                                        <div class="col-lg-10">
                                          <label>
                                            <input class="form-check-input" type="radio" checked value="option1" id="optionsradios1" name="optionsradios">
                                            Yes, you may use my specifics to share with colleagues
                                          </label>
                                        </div>
                                        <div class="col-md-6">
                                          <label>
                                            <input class="form-check-input" type="radio" value="option2" name="optionsradios">
                                            No, I would rather not share any specifics
                                          </label>
                                        </div>
                            </div>
                                    </form>
                                    </div>
                                    <div class="wrapper wrapper-content animated fadeInRight">
                                        
                                                <h3>Thank you for your TIP!</h3>
                                                <h3>To save your TIP and finish later, please select Save below</h3>
                                                <h3>DO NOT CHOOSE SUBMIT until you have completed your TIP.</h3>
                                    </div>
                                    <div class="form-inline">
                                       <div class="col-sm-offset-0">
                                           <button class="btn btn-lg btn-#5E5E5E" type="submit">Save and Resume Later</button>
                                           <button class="btn btn-lg btn-primary btn-#5E5E5E pull-center" type="submit">Submit TIP</button>
                                       </div>
                                   </form>
                        </div>
<<<<<<< HEAD:prod/resources/views/home/tip-questions.blade.php
                        </div>
                        
                        
                    
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
    
    
=======
                    </div>
                </div>
            </div>
        </div>


>>>>>>> f365611ed45ac74d94b9d517c0651f485de01459:prod/resources/views/tips/create.blade.php
@endsection
