@extends('layouts.app')

@section('title', 'TIPS Submission')

@section('content')

<!-- Second TIP Questionnaire page - url 'tip/questions' -->

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            
            <!-- Start TIP instructions -->
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
                </div><!-- tip-instructions -->
                <div style="display:none" id="show-instructions">
                    <a class="show-instructions"><span class="glyphicon glyphicon-chevron-down"></span>Show Instructions</a>
                    <br><br>
                </div>
            </div><!-- col-sm-12 -->
            
            
            <!-- Start TIP questions form -->
            <form id="tip" class="form-horizontal">
                {{ csrf_field() }}
            
            <!-- start foreach loop through questions -->
            @foreach($questions as $question)
                <div class="ibox float-e-margins">
                    
                 <!-- output question_text and then question_desc (example answer) in '?' popover--->   
                <div class="ibox-title">
                        <h5 style="font-size:1.2em">{{ $question->question_text }}</h5>
                    <div class="ibox-tools">
                        <a tabindex="0" role="button" data-toggle="popover" data-trigger="focus" title="Example Answer" data-placement="left" data-content="{{ $question->question_desc }}"><span class="glyphicon glyphicon-question-sign" style="font-size:1.2em"></span></a>
                    </div><!-- ibox-tools -->
                </div><!-- ibox title-->    
                
                
                <div class="ibox-content">
                <div class="form-group">
    
                <!-- start if/else block that outputs different HTML based on question_type (TEXT, DROPDOWN, RADIO, CHECKBOX) -->
                @if ($question->question_type == "TEXT")
                        <div class="col-lg-8 col-sm-12">
                        <textarea class="form-control" name="{{ $question->question_id }}" value="{{ $question->question_id }}" rows="4" cols="60"></textarea>
                @elseif ( $question->question_type == "DROPDOWN")       
                        <div class="col-sm-4">
                        <select class="form-control" name="{{ $question->question_id }}">
                            <option selected disabled>Choose here</option>
                            @foreach ($question->answer as $answer)
                            <option select="{{$answer->answer_text}}">{{$answer->answer_text}}</option>
                            @endforeach
                        </select>
                 @elseif ($question->question_type == "RADIO")       
                       <div class="col-sm-8">
                            <div class="form-check">
                                @foreach ($question->answer as $answer)
                                <div class="col-sm-12">
                                    <label class="form-check-label">
                                        <input type="radio" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}" class="form-check-input">   {{ $answer->answer_text }}
                                    </label>
                                </div>
                                @endforeach
    
                            </div><!-- form-check-->
                @elseif ($question->question_type == "CHECKBOX")       
                       <div class="col-sm-8">
                            <div class="form-check">
                                @foreach ($question->answer as $answer)
                                <div class="col-sm-12">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}">   {{ $answer->answer_text }}
                                    </label>
                                </div>
                                @endforeach
                            </div><!-- form-check-->
                @endIf
                
                </div><!-- answer div -->
                </div><!-- form-group -->
                
                </div><!-- ibox-content -->
                </div><!-- ibox -->
            
            @endforeach
                    
                        
                        
                        
            <!-- start form buttons -->            
           <br><br>
           <div class="form-group">
               <div id="form-buttons">
                   <div class="col-md-3">
                       <a href="{{ url('/tip') }}" class="btn btn-lg btn-block btn-warning">Back</a>
                   </div>
                   <div class="col-md-3">
                    </div>
                   <div class="col-md-3">
                       <button class="btn btn-lg btn-block btn-secondary" value="save" name="save" type="submit">Save Draft</button>
                   </div>
                   <div class="col-md-3">
                       <a href="#" class="btn btn-lg btn-block btn-primary" id="submit">Submit</a>
                   </div>
               </div><!-- form-buttons -->
               
               <!-- Display when user clicks submit. Displays alert asking user to confirm submission -->
               <div id="confirm-submit" style="display:none">
                       <div class="alert alert-danger col-md-6 col-md-offset-3 text-center" role="alert">
                           <h3>Once you submit this TIP you will not be able to edit it again.</h3> 
                           <h3><strong>Are you sure? </strong></h3>
                       </div>
                         <br><br>
                   <div class="col-md-6">
                       <a href="#" class="btn btn-lg btn-block btn-primary" id="not-now">Not Now</a>
                   </div>
                   <div class="col-md-6">
                       <button class="btn btn-lg btn-block btn-primary" value="submit" name="submit" type="submit">Submit</button>
                   </div>
               </div><!-- confirm-submit -->
            </div> <!-- form-group --> 
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
        
        //When submit is clicked - show alert for user to confirm form submission
        $("#submit").click(function() {
            $("#form-buttons").hide();
            $("#confirm-submit").slideDown("slow");
            $('html, body').animate({scrollTop: $("#confirm-submit").offset().top}, 2000);
         });
         $("#not-now").click(function() {
            $("#confirm-submit").hide();
            $("#form-buttons").slideDown("slow");
            $('html, body').animate({scrollTop: $("#form-buttons").offset().top}, 2000);
         });
     });
</script>
    
    
@endsection