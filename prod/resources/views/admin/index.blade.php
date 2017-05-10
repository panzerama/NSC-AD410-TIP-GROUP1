@extends('layouts.admin-app')
<style>
    .textarea{
        
    font-size: 60px;
    }
    
</style>

@section('title', 'TIPS Management')
@section('content')
<?php
    set_include_path('lib/TipsManagementFunctions.php');
    $q_number = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
    $length_q_number = count($q_number);
    $q_text = array("What is your Division?","Course Prefix?","Course Number?","Quarter-Year?","What is the problem or lesson that you identified and will be discussing in this TIP? No topic is too big or too small. All are welcomed!","What is the course-level objective that this TIP best addresses?","Which of the college-wide Essential Learning Outcomes does your TIP most closely address?","Which of the following best describes the evidence you found for the problem?","Please describe more specifcally how you identified the problem. For example, Based on discussion posts, I realized that more than half of the class did not understand the prompt and was not demonstrating the kind of comprehension I was looking for.","Please select the change that best fits what you did to try to address the problem.","Specifically, what did you do to address the problem? For example, I broke the prompt down into two separate discussions so that it was clearer what the students should think about and write about in their posts.","Please select the evidence that best fits how you assessed the impact of the change you made.","Please describe more fully how you assessed the impact of the change you made. For example,  After I broke the prompt into two discussions, more students were able to write about the ideas thoroughly. This time it was about 75% of students. I might want to refine the prompts even further, but this was a good change.","What new opportunities did you consider as a result of identifying this problem and making this change?","What else would you like to share about the teaching improvement process you engaged in this quarter?","TIP data will be shared de-identified and in aggregate. TIPs are NOT an evaluation of your teaching. It is useful to campus-wide assessment and professional development to use specifics of individual TIPs.");
    $q_type = array("droplist","textbox","textbox","droplist","scrollingtextbox","scrollingtextbox","droplist","droplist","scrollingtextbox","droplist","scrollingtextbox","droplist","scrollingtextbox","droplist","scrollingtextbox","radiobutton");
    $q_is_active = array(1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1); 
    $q_description = array("","","","","","","","","","","","","","","","");
    $answer_divion_options = array("AHSS","BEIT","BTS","HHS","LIB","M&S");
    $answer_qtr_options = array("Spring", "Summer", "Fall", "Winter","Spring", "Summer", "Fall", "Winter", "Spring", "Summer", "Fall", "Winter", "Spring");
    $answer_year_options= array("2014","2014","2014","2015","2015","2015","2015","2016","2016","2016","2016","2017","2017");
    $answer_elo_options = array("Facts, theories, perspectives, and methodologies within and across disciplines","Critical thinking and problem solving","Communication and self-expression","Quantitative reasoning","Information literacy","Technological proficiency","Collaboration: group and team work","Civic engagement: local, global, and environmental","Intercultural knowledge and competence","Ethical awareness and personal integrity","Lifelong learning and personal well-being","Synthesis and application of knowledge, skills, and responsibilities to new settings and problems");
    $answer_problem_options = array("Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior (e.g. length of time to complete a learning activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc.");   
    $answer_change_options = array("Modified a learning activity", "Added a new learning activity", "Provided more context or more practice", "Provided Real World examples or applications", "Tried a new approach to the material", "Tried a new approach to the material",  "Reviewed the material");   
    $answer_impact_options = array("Direct student feedback (e.g. written or verbal communication with students, SGID, etc.)", "Student behavior behavior (e.g. length of time to complete a learning, activity, number of clarifying questions the students asked, etc.)", "Student performance on a learning activity, assignment, a quiz or exam, a skill demonstration, oral presentation, etc.");   
    $answer_opportunities_options = array("Gave you an idea for additional changes to this course", "Gave you an idea for changes to another course", "Suggested a topic for discussion with colleagues in your program/discipline", "Suggested a topic that an interdisciplinary group of faculty could productively examine", "Prompted consideration of a sabbatical for more in-depth study", "Uncovered a topic for a faculty retreat");
    $answer_optinout_options = array("Yes, you may use my specifics to share with colleagues", "No, I would rather not share any specifics"); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                      <h2>TIPS Management</h2>  
                    </div>
                    <div class="ibox-title">
                      <h3>Question List<br> </h3>
                    </div>
                </div>    <!-- end ibox -->
            </div>    <!-- end col lg 12 -->
        </div>    <!-- end row -->
    </div>     <!-- wrapper -->
    <div class="panel panel-body" align="left">
        <?php for($i = 0, $l = count($q_number); $i < $l; ++$i) {
        $question = $q_text[$i];
        ?>
            <form>
                <!-- begin row -->
                <div class="row">
                    <!-- col 1 -->
                    <div class="col-lg-6">
                    <textarea style="width:100%" class="text-area" name="q_text"><?php echo $question; ?></textarea>
                    </div>
                    <div class="col-lg-6">
                        <p>  
                            <button type="button" class="btn btn-outline btn-default" name="addbefore" >Add New Before</button>
                            <button type="button" class="btn btn-outline btn-primary" name="addafter">Add New After</button>
                            <button type="button" class="btn btn-outline btn-success" name="moveup">Move Up</button>
                            <button type="button" class="btn btn-outline btn-info" name="movedown">Move Down</button>
                            <button type="button" class="btn btn-outline btn-warning" name="modify">Modify</button>
                        <?php   if($q_is_active[$i] == 1){
                        ?>
                            <button type="button" class="btn btn-outline btn-danger" name="inactivate">Inactivate</button>
                        <?php   } else{
                        ?>        
                            <button type="button" class="btn btn-outline btn-primary" name="activate">Activate</button>
                        <?php   };
                        ?>
                        </p>
                    </div>  <!-- end col lg 6 -->
                </div>   <!-- end row -->
                <br>
        <?php }; ?>   <!-- end for loop -->
             
                <br>
        </form> 
    </div>      <!-- end panel body -->        
    <?php
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
            case 'addbefore':
                addbefore();
                break;
            case 'addafter':
                addafter();
                break;
            case 'moveup':
                moveup();
                break;
            case 'movedown':
                movedown();
                break;
            case 'modify':
                modify();
                break;
            case 'inactivate':
                inactivate();
                break;
            case 'activate':
                activate();
                break;
            case 'cancel':
                cancel();
                break;
            case 'submit':
                submit();
                break;
            }
        }
    ?>
@endsection
