
<!-- Edit an answer list Modal -->
<div class="modal fade" id="editAnswerListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add Before:</h4>
            </div>
            <div class="modal-body">
                <div class="wrapper wrapper-content animated fadeInRight">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h2>Answer Management</h2>  
                                </div>
                                <div class="ibox-title">
                                    <h3>Edit List<br> </h3>
                                </div> <!-- end ibox  title-->
                            </div> <!-- end ibox title -->   
                        </div>    <!-- end col lg 12 -->
                    </div>    <!-- end row -->
                </div>     <!-- wrapper -->
                <div class="panel panel-body" align="left">
                    @foreach($answers as $answer)
                        @if ($question->question_id == $answer->question_id)
                            <!-- when submit the form, send it to route tip/edit, which will send it to the applicable function     -->
                            <form method="post" action="/tip/edit">
                            <!--  send a token with the form for Laravel to validate - to confirm this is the form that is on the server for the website to prevent people to make forms and inject forms/data    -->
                            {{ csrf_field() }}
                            <!-- begin row -->
                            <div class="row">
                            <!-- col 1 -->
                                <div class="col-lg-6">
                                    <textarea style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_text" readonly> {{ $answer->answer_text}} </textarea>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-outline btn-default" value="" name="addbefore" data-toggle="modal" data-target="#addBeforeModal">Add New Before</button>
                                    <button type="button" class="btn btn-outline btn-primary" value="" name="addafter" data-toggle="modal" data-target="#addAfterModal">Add New After</button>
                                    <button type="button" class="btn btn-outline btn-warning" value="" name="modify" data-toggle="modal" data-target="#modifyModal">Modify</button>
                                    @include('modals/add_modify_question')
                                    <button type="submit" class="btn btn-outline btn-success" value="" name="moveup">Move Up</button>
                                    <button type="submit" class="btn btn-outline btn-info" value="" name="movedown">Move Down</button>
                                    @if ($answer->is_active == 1)
                                        <button type="submit" class="btn btn-outline btn-danger" value="" name="inactivate">Inactivate</button>
                                    @else
                                        <button type="submit" class="btn btn-outline btn-primary" value="" name="activate">Activate</button>
                                    @endif
                                </div>  <!-- end col lg 6 -->
                            </div>   <!-- end row -->
                            <br>
                        @endif    
                    @endforeach   
                    <br>
                </div>      <!-- end panel body -->        
            </div> <!-- end modal body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>  <!-- end div class modal footer  -->
        </div>  <!-- end div class modal fade -->
    </div>   <!-- end div class modal dialog  -->
</div>   <!--  end div class modal fade  -->