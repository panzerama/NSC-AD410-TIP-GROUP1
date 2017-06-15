@extends('layouts.app')

@section('title', 'TIP Submission')

@section('content')

<!-- First TIP Questionnaire page - url 'tip' -->
<div class="wrapper wrapper-content animated fadeInRight">
    <!--if question one is not filled out will be empty-->
    @foreach ($question_one as $one)
        <!--{{$one->question_answer}}-->
    @endforeach
    @if (Session::has('message'))
       <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-12">
 
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
                </div><!--tip-instructions-->
                <div style="display:none" id="show-instructions">
                    <a class="show-instructions"><span class="glyphicon glyphicon-chevron-down"></span>Show Instructions</a>
                    <br><br>
                </div>
            </div><!--col-sm-12-->
            
            
            <!--start form-->
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    @if (count($errors) > 0)
                <div class="alert alert-danger text-center">
                    <h3>All questions are required. Please fill out all fields. Thank you!</h3>
                    <!--<ul>-->
                    <!--    @foreach ($errors->all() as $error)-->
                    <!--    <li>{{ $error }}</li>-->
                    <!--    @endforeach-->
                    <!--</ul>-->
                </div>
            @endif
                    
                    <form class="form-horizontal" method = "post" action = "{{ route('tipStore')}}">
                        {{ csrf_field() }}
                        <br>
                        @if(!$one->question_answer == '')
                            <div style="display:none" class="form-group">
                        @else 
                            <div class="form-group">
                        @endIf
                            <label class="col-sm-2 control-label">Is this an individual or group TIP?</label>
                                <div class="col-sm-8">
                                    <!--<select class="form-control" id="tip-type" name="tip-type">-->
                                    <select class="form-control" id="tip-type" name="1">
                                        <option selected disabled>Choose here</option>
                                        @foreach($questions as $question) 
                                            @if($question->question_text == 'Is this an individual or group TIP?')
                                                 @foreach($question->answer as $answer)
                                                     @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer)
                                                         <option selected select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @else
                                                        <option select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @endIf
                                                @endforeach
                                            @endIf
                                        @endforeach
                                    </select>
                                </div><!--col-sm-8-->
                        </div><!--form-group-->
                        
                        
                        <!--Only displays when user selects Group Tip radio option-->
                        <!--jquery function will add fields when user clicks 'Add Another Member'-->
                        <div style="display:none" id="group-tip">
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label class="col-sm-12">Enter the name of additional TIP member</label>
                                <small class="col-sm-12">Click Add Another Member to enter more than one member</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 add-member-field-div">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control autocomplete" name="tip-members[]">
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="add-tip-member"><span class="glyphicon glyphicon-plus"></span> Add Another Member</a>
                                    </div>
                                    <br><br><br>
                               </div>
                             </div>
                         </div>
                
                         @if(!$one->question_answer == '')
                            <div style="display:none" class="hr-line-dashed"></div>
                        @else 
                            <div class="hr-line-dashed"></div>
                        @endIf
                        
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Division</label>
                                <div class="col-sm-8">
                                    <!--<select class="form-control" name="division">-->
                                    <select required class="form-control" name="2">
                                        <option selected disabled>Choose division</option>
                                        @foreach($questions as $question) 
                                            @if($question->question_text == 'Division')
                                                 @foreach($question->answer as $answer)
                                                     @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer)
                                                         <option selected select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @else
                                                        <option select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @endIf
                                                @endforeach
                                            @endIf
                                        @endforeach
                                    </select>
                                </div><!--col-sm-8-->
                        </div><!--form-group-->
                        
                        <div class="hr-line-dashed"></div>
                        
                        
                        <div class="form-group">
                           <label class="col-sm-2 control-label">Enter Course Prefix</label>
                           @foreach($questions as $question) 
                                @if($question->question_text == 'Enter Course Prefix')
                                     <div class="col-sm-8">
                                     @if($existing_answers[$question->question_number - 1]->question_answer)
                                         <!--<input type="text" class="form-control" name="course-prefix" value="{{ $existing_answers[$question->question_number - 1]->question_answer }}">-->
                                        <input type="text" class="form-control" name="3" value="{{ $existing_answers[$question->question_number - 1]->question_answer }}">
                                     @else
                                        <!--<input type="text" class="form-control" name="course-prefix">-->
                                        <input type="text" class="form-control" name="3">
                                     @endIf
                                    </div>
                                @endIf
                            @endforeach
                       </div>
                       
                       <div class="form-group">
                           <label class="col-sm-2 control-label">Enter Course Number</label>
                           @foreach($questions as $question) 
                                @if($question->question_text == 'Enter Course Number')
                                     <div class="col-sm-8">
                                     @if($existing_answers[$question->question_number - 1]->question_answer)
                                         <!--<input type="text" class="form-control" name="course-number" value="{{ $existing_answers[$question->question_number - 1]->question_answer }}">-->
                                        <input type="text" class="form-control" name="4" value="{{ $existing_answers[$question->question_number - 1]->question_answer }}">
                                     @else
                                        <!--<input type="text" class="form-control" name="course-number">-->
                                        <input type="text" class="form-control" name="4">
                                     @endIf
                                    </div>
                                @endIf
                            @endforeach
                       </div>

                       <div class="hr-line-dashed"></div>
                           
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Select Quarter</label>
                                <div class="col-sm-8">
                                    <!--<select class="form-control" name="quarter">-->
                                    <select class="form-control" name="5">
                                        <option selected disabled>Choose quarter</option>
                                         @foreach($questions as $question) 
                                            @if($question->question_text == 'Select Quarter')
                                                 @foreach($question->answer as $answer)
                                                     @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer)
                                                         <option selected select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @else
                                                        <option select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @endIf
                                                @endforeach
                                            @endIf
                                        @endforeach
                                    </select>
                                </div><!--col-sm-8-->
                        </div><!--form-group-->
                        
                        <!--TO DO: populate year with list-->
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Select Year</label>
                                <div class="col-sm-8">
                                    <!--<select class="form-control" name="year">-->
                                    <select class="form-control" name="6">
                                        <option selected disabled>Choose year</option>
                                        @foreach($questions as $question) 
                                            @if($question->question_text == 'Select Year')
                                                 @foreach($question->answer as $answer)
                                                     @if($answer->answer_text == $existing_answers[$question->question_number - 1]->question_answer)
                                                         <option selected select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @else
                                                        <option select="{{ $answer->answer_text }}">{{ $answer->answer_text }}</option>
                                                     @endIf
                                                @endforeach
                                            @endIf
                                        @endforeach
                                    </select>
                                </div><!--col-sm-8-->
                        </div><!--form-group-->
                </div><!-- ibox-content -->
            </div><!--ibox-->
            <br><br>
           <div class="form-group">
               <div class="col-sm-3 col-md-offset-9">
                   <!--<a href="{{ url('/tip/questions') }}" class="btn btn-lg btn-block btn-primary" value="continue" name="continue" type="submit">Continue</a>-->
                    <button class="btn btn-lg btn-block btn-primary" value="continue" name="continue" type="submit">Continue</button>
               </div>
           </div><!--form-group-->
           <br><br><br>
        
            
        </form><!-- end form -->
        <br><br><br><br>
               
        </div><!-- col-lg-12 -->
    </div><!--row-->
</div><!--wrapper-->
           
            
@endsection
@section('scripts')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
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
        
        //hide or show field to add more more members to TIP based on if user selects group or indy option
        $('#tip-type').on('change', function() {
          if ( this.value == 'Group'){
             $("#group-tip").slideDown();
          }else{
             $("#group-tip").slideUp();
          }
        });
    });
    //Adds field to when user clicks 'Add Another Member' / Removes field when user clicks 'remove'
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".add-member-field-div"); //Fields wrapper
    var add_member      = $(".add-tip-member"); //Add button ID
    var x = 1; //initlal text box count
    // get faculty names and turn it into json array
    var faculty_names = {!! json_encode($faculty_names->toArray()) !!};
    names = [];
    // store json properties into names array and call autocomplete function
    $.each( faculty_names, function( key, val1 ) {
                    names.push(val1.faculty_name);    
                });
    $( ".autocomplete" ).autocomplete({
            source: names
        });
    // also call auto complete once field is added
    $(add_member).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-6 field"><br><input class="form-control autocomplete type="text" name="tip-members[]"/><a href="#" class="remove_field"><br><span class="glyphicon glyphicon-minus"></span>  Remove</a></div>'); //add input box
            $( ".autocomplete" ).autocomplete({
            source: names
        });
            
        }
    });
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); 
        $(this).parent('div').remove();
        x--;
    });
</script>

@endsection