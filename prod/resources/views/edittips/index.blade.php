@extends('layouts.admin-app')
<style>
    .textarea{
    font-size: 70px;
    }
</style>

@section('title', 'TIPS Management')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
<!--            <div class="col-lg-12">   -->
                <div class="ibox float-e-margins">
                    <div class="col-lg-3" text-center>    
                      <h2>TIPS Management</h2>  
                    </div>
                    <div class="col-lg-3" text-center>
                    </div>
                    <div class="col-lg-2" text-center>
                      <h2>Question List<br> </h2>
                    </div>
                    <div class="col-lg-4" text-center>
                    </div>
                     <div class="col-lg-10" text-center>
                     </div>
                     <div class="col-lg-2" text-center>
                      <button type="button" class="btn btn-outline btn-primary" name="editdivlist" data-toggle="modal" data-target="#editDivisionListModal">Edit Division List</button>
                      <!-- include('modals/edit_division_list') -->
                    </div>
                </div>    <!-- end ibox -->
<!--            </div>  -->  <!-- end col lg 12 -->
        </div>    <!-- end row -->
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
                    <div class="col-lg-5">
                    <textarea style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="q_text" readonly> {{ $question->question_text }} </textarea>
                    </div>
                    <div class="col-lg-7">
                 
                            <button type="button" class="btn btn-outline btn-default" data-toggle="modal" data-target="#addBeforeModal" onClick="add_edit_button({{ $question->question_number }} , 'addbefore', null)">Add New Before</button>
                            <button type="button" class="btn btn-outline btn-primary" data-toggle="modal" data-target="#addBeforeModal" onClick="add_edit_button({{ $question->question_number }} , 'addafter', null)">Add New After</button>
                            <button type="button" class="btn btn-outline btn-warning" data-toggle="modal" data-target="#addBeforeModal" onClick="add_edit_button({{ $question->question_number }} , 'modify', null )">Modify</button>
                            @include('modals/add_modify_question')
                            <button type="submit" class="btn btn-outline btn-success" value="{{ $question->question_number }}" name="moveup">Move Up</button>
                            <button type="submit" class="btn btn-outline btn-info" value="{{ $question->question_number }}" name="movedown">Move Down</button>
                            @if($question->is_active == 1)
                                <button type="submit" class="btn btn-outline btn-danger" value="{{ $question->question_id }}" name="inactivate">Inactivate</button>
                            @else
                                <button type="submit" class="btn btn-outline btn-primary" value="{{ $question->question_id }}" name="activate">Activate</button>
                            @endif
                        @if($question->question_type=='DROPDOWN')
                            <button type="button" class="btn btn-outline btn-primary" value="{{ $question->question_id }}" name="editlist" data-toggle="modal" data-target="#editAnswerListModal">Edit List</button>
                            <!-- include('modals/edit_answer_list') -->
                        @endIf              
                        </p>
                    </div>  <!-- end col lg 6 -->
                </div>   <!-- end row -->
                <br>
         @endforeach
                <br>
        </form> 
    </div>      <!-- end panel body -->        



<script type="text/javascript">
function add_edit_button(question_number, action, question_text_data){
  
    switch(action) {
        case 'addbefore':
            document.getElementById('add_edit_modal').innerHTML = "Add New Before:";
            document.getElementById('add_edit_info').setAttribute("name",action);
            document.getElementById('add_edit_info').setAttribute("value",question_number);
            document.getElementById('question_text').innerHTML = "";
            break;
        case 'addafter':
            document.getElementById('add_edit_modal').innerHTML = "Add New After:";
            document.getElementById('add_edit_info').setAttribute("name",action);
            document.getElementById('add_edit_info').setAttribute("value",question_number);
            document.getElementById('question_text').innerHTML = "";
            break;
        case 'modify':
            document.getElementById('add_edit_modal').innerHTML = "Modify:";
            document.getElementById('add_edit_info').setAttribute("name",action);
            document.getElementById('add_edit_info').setAttribute("value",question_number);
            document.getElementById('question_text').innerHTML = question_text_data;
            break;    
        default:
            
    }
    
}


</script>            
@endsection
