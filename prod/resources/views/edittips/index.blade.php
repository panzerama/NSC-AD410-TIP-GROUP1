@extends('layouts.admin-app')
<style>
    .textarea{
    font-size: 70px;
    }
</style>

@section('title', 'TIPS Management')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
                 <div class="ibox float-e-margins">
                    <div class="col-lg-3" text-center>    
                      <h2>TIPS Management</h2>  
                    </div>
                    <div class="col-lg-2" text-center>
                    </div>
                    <div class="col-lg-3" text-center>
                      <h2>Question List<br> </h2>
                    </div>
                    <div class="col-lg-2" text-center>
                    </div>
                    <div class="col-lg-2" text-center>
                        </br>     <!-- add a line break to align the button with the titles  -->
                        <button type="button" class="btn btn-outline btn-default" name="editdivlist" data-toggle="modal" data-target="#editDivisionListModal">Edit Division List</button>
                        @include('modals/edit_division_list')
                    </div>
                </div>    <!-- end ibox -->
    </div>     <!-- wrapper -->
    <div class="panel panel-body" align="left">
        @foreach($questions as $question)
            <!-- when submit the form, send it to route tip/edit, which will send it to the applicable function     -->
            <form method="post" action="/tip/edit">
                <!--  send a token with the form for Laravel to validate - to confirm this is the form that is on the server for the website to prevent people to make forms and inject forms/data    -->
                {{ csrf_field() }}
                <!-- begin row -->
                <div class="row">
                    <!-- col 1 -->
                    <div class="col-lg-4">   
                    <textarea style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="q_text" readonly> {{ $question->question_text }} </textarea>
                    </div>    

                    <div class="col-lg-1">   
                    Type: <br>
                    {{ $question->question_type }}   
                    </div>    


                    <div class="col-lg-7"> 
<!--                    <br>    -->
                        @if($question->is_active == 1)
                            <input type="hidden" id="{{ $question->question_number }}" data-text="{{ $question->question_text }}" data-desc="{{ $question->question_desc }}" >
                            <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#addBeforeModal" onClick="add_edit_button({{ $question->question_number }} , 'addbefore')">Add Before</button>
                            <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#addBeforeModal" onClick="add_edit_button({{ $question->question_number }} , 'addafter')">Add After</button>
                            <button type="button" class="btn btn-outline btn-warning" data-toggle="modal" data-target="#addBeforeModal" onClick="add_edit_button({{ $question->question_number }} , 'modify')">Modify</button>
                            @include('modals/add_modify_question')
                            <button type="submit" class="btn btn-outline btn-info" value="{{ $question->question_number }}" name="moveup">Move Up</button>
                            <button type="submit" class="btn btn-outline btn-success" value="{{ $question->question_number }}" name="movedown">Move Down</button>
<!--                            @if($question->is_active == 1)  -->
                            <button type="submit" class="btn btn-outline btn-danger" value="{{ $question->question_id }}" name="inactivate">Inactivate</button>
<!--                            @else  -->
<!--                                <button type="submit" class="btn btn-outline btn-success" value="{{ $question->question_id }}" name="activate">Activate</button>  -->
<!--                            @endif   -->
                            
                            @if($question->question_type=='DROPDOWN' || $question->question_type=='CHECKBOX' || $question->question_type=='RADIO')
                                <button type="button" class="btn btn-outline btn-default"  id="edit_list" value="{{ $question->question_id }}" data-toggle="modal" data-target="#editAnswerListModal" onClick="add_edit_button({{ $question->question_id }} , 'editlist' )">Edit List</button>
                                @include('modals/edit_answer_list') 
                            @endIf              
                            @else
                                <button type="submit" class="btn btn-outline btn-info" value="{{ $question->question_id }}" name="activate">Activate</button>
                            @endif
                            
                        </p>
                    </div>  <!-- end col lg 6 -->
                </div>   <!-- end row -->
                
         @endforeach
                
        </form> 
        <br>
    </div>      <!-- end panel body -->        
<!-- Java script handling for add before, add after, modify and edit list -->
<!-- Add before, Add after and Modify all use the same modal -->
<script type="text/javascript">
function add_edit_button(question_number, action){
    var type_list_div = document.getElementById('type_drop_down');
    switch(action) {

        case 'addbefore':
            document.getElementById('question_text').innerHTML = "";
            document.getElementById('question_desc').innerHTML = "";
            document.getElementById('add_edit_modal').innerHTML = "Add New Before:";
            document.getElementById('add_edit_info').setAttribute("name",action);
            document.getElementById('add_edit_info').setAttribute("value",question_number);
            type_list_div.style.display = 'block';
            break;
        case 'addafter':
            document.getElementById('question_text').innerHTML = "";
            document.getElementById('question_desc').innerHTML = "";
            document.getElementById('add_edit_modal').innerHTML = "Add New After:";
            document.getElementById('add_edit_info').setAttribute("name",action);
            document.getElementById('add_edit_info').setAttribute("value",question_number);
            type_list_div.style.display = 'block';
            break;
        case 'modify':
            var question_text = document.getElementById(question_number).dataset.text;
            var question_desc = document.getElementById(question_number).dataset.desc;
            document.getElementById('question_text').value = question_text;
            document.getElementById('question_desc').value = question_desc;
            document.getElementById('add_edit_modal').innerHTML = "Modify:";
            document.getElementById('add_edit_info').setAttribute("name",action);
            document.getElementById('add_edit_info').setAttribute("value",question_number);
            type_list_div.style.display = 'none';
            break;   
        case 'editlist':
            document.getElementById('edit_list').setAttribute("value",question_number);
            document.getElementById('refreshbutton').setAttribute("value",question_number);
        default:
            
    }
    
}

</script>


@endsection
