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
            @if($question->question_number > 6)
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
                        <textarea class="form-control" name="{{ $question->question_id }}" value="{{ $question->question_id }}" rows="4" cols="60">{{ $existing_answers[$question->question_number - 1]->question_answer }}</textarea>
                @elseif ( $question->question_type == "DROPDOWN")       
                        <div class="col-sm-4">
                        <select class="form-control" name="{{ $question->question_id }}">
                            <option selected disabled>Choose here</option>
                            @foreach ($question->answer as $answer)
                                @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer) 
                                    <option selected select="{{$answer->answer_text}}">{{$answer->answer_text}}</option>
                                @else
                                    <option select="{{$answer->answer_text}}">{{$answer->answer_text}}</option>
                                @endIf
                            @endforeach
                        </select>
                 @elseif ($question->question_type == "RADIO")       
                       <div class="col-sm-8">
                            <div class="form-check">
                                @foreach ($question->answer as $answer)
                                    @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer)
                                        <div class="col-sm-12">
                                            <label class="form-check-label">
                                                <input checked="checked" type="radio" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}" class="form-check-input">   {{ $answer->answer_text }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="col-sm-12">
                                            <label class="form-check-label">
                                                <input type="radio" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}" class="form-check-input">   {{ $answer->answer_text }}
                                            </label>
                                        </div>
                                    @endIf
                                @endforeach
    
                            </div><!-- form-check-->
                @elseif ($question->question_type == "CHECKBOX")       
                       <div class="col-sm-8">
                            <div class="form-check">
                                @foreach ($question->answer as $answer)
                                    @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer)
                                        <div class="col-sm-12">
                                            <label class="form-check-label">
                                                <input checked="checked" type="checkbox" class="form-check-input" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}">   {{ $answer->answer_text }}
                                            </label>
                                        </div>
                                    @else
                                        <div class="col-sm-12">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="{{ $question->question_id }}" value="{{ $answer->answer_text }}">   {{ $answer->answer_text }}
                                            </label>
                                        </div>
                                    @endIf
                                @endforeach
                            </div><!-- form-check-->
                @endIf
                
                </div><!-- answer div -->
                </div><!-- form-group -->
                
                </div><!-- ibox-content -->
                </div><!-- ibox -->
            @endif
            @endforeach
                    
                        
                        
                        
            <!-- start form buttons -->            
           <br><br>
           <div class="form-group">
               <div id="form-buttons">
                   <div style="display:none" class="confirm-submit alert alert-danger col-md-10 col-md-offset-1 text-center" role="alert">
                           <h3>Once you submit this TIP you will not be able to edit it again. Select 'Save Draft' to save and resume later.</h3> 
                           <h3><strong>Are you sure you want to submit now? If so, click submit again.</strong></h3>
                   </div>
                   <div class="col-md-3">
                       <a href="{{ url('/tip') }}" class="btn btn-lg btn-block btn-warning">Back</a>
                   </div>
                   <div class="col-md-3">
                       <a style="display:none" href="#" class="confirm-submit btn btn-lg btn-block btn-primary" id="not-now">Not Now</a>
                    </div>
                   <div class="col-md-3">
                       <button class="btn btn-lg btn-block btn-secondary" value="save" name="save" type="submit">Save Draft</button>
                   </div>
                   <div class="col-md-3">
                        <!-- first click brings up alert, second click (on button) submits form --> 
                       <a href="#"  class="btn btn-lg btn-block btn-primary" id="first-click-submit">Submit</a>
                       <button style="display:none" class="confirm-submit btn btn-lg btn-block btn-primary" value="submit" name="submit" type="submit">Submit</button>
                   </div>
                   
               </div><!-- form-buttons -->
               
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
        $("#first-click-submit").click(function() {
            $("#first-click-submit").hide();
            $(".confirm-submit").slideDown("slow");
            $('html, body').animate({scrollTop: $("#form-buttons").offset().top}, 2000);
         });
         $("#not-now").click(function() {
            $(".confirm-submit").slideUp("slow");
            $("#first-click-submit").slideDown("slow");
            $('html, body').animate({scrollTop: $("#form-buttons").offset().top}, 2000);
         });
     });
</script>
    
    
@endsection