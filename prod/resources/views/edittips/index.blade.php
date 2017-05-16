@extends('layouts.admin-app')
<style>
    .textarea{
        
    font-size: 60px;
    }
    
</style>

@section('title', 'TIPS Management')
@section('content')
<?php
    //  @php ($id = $question->question_id)
    //  @php ($number = $question->question_number)
    //  @php ($text = $question->question_text)
    //  @php ($type = $question->question_type)
    //  @php ($is_active = $question->is_active)
    //  @php ($type = $question->question_type)
    //  @php ($example = $question->question_desc)
    //  @php ($timestamp = $question->timestamps)
        
    // @if ($type::'DROPDOWN')
    //     @foreach($questions as $question)
    //     @php ($useranswer = Request::input($id))
    //    <li>Question ID: {{ $id }} - Answer: {{ $useranswer }}</li>
    //  @endIf
    //   
    //  $table->increments('answer_id');
    //  $table->integer('question_id')->unsigned();
    //  $table->text('answer_text');
    //  $table->boolean('is_active');
    //  $table->timestamps();
    set_include_path('lib/TipsManagementFunctions.php');
?>
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
        @foreach($questions as $question)
            <form>
                <!-- begin row -->
                <div class="row">
                    <!-- col 1 -->
                    <div class="col-lg-6">
                    <textarea style="width:100%"  style="font-weight:bold" class="text-area" name="q_text" readonly> {{ $question->question_text}} </textarea>
                    </div>
                    <div class="col-lg-6">
                        @if ($question->question_id > 6)
                            <button type="button" class="btn btn-outline btn-default" name="addbefore" >Add New Before</button>
                            <button type="button" class="btn btn-outline btn-primary" name="addafter">Add New After</button>
                            <button type="button" class="btn btn-outline btn-success" name="moveup">Move Up</button>
                            <button type="button" class="btn btn-outline btn-info" name="movedown">Move Down</button>
                            <button type="button" class="btn btn-outline btn-warning" name="modify">Modify</button>
                            @if ($question->is_active == 1)
                                <button type="button" class="btn btn-outline btn-danger" name="inactivate">Inactivate</button>
                            @else
                                <button type="button" class="btn btn-outline btn-primary" name="activate">Activate</button>
                            @endif
                        @endif
                        @if ($question->question_type=='DROPDOWN')
                            <button type="button" class="btn btn-outline btn-primary" name="edit_list">Edit List</button>
                        @endIf              
                        </p>
                    </div>  <!-- end col lg 6 -->
                </div>   <!-- end row -->
                <br>
         @endforeach
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
