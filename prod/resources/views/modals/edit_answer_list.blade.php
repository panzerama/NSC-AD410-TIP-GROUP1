<div class="modal fade" id="editAnswerListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Answers List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
              </div>
            </div>
          <div id="answer_area">
          </div> 
          <hr>
          <div id='new_answer_area'>
            <div class="row">
              <div class="col-lg-8">
                <label for="new_answer">Add a new answer</label>
                <textarea style="width:100%" id="new_answer" style="font-weight:bold" style="font-size =lg" class="text-area" value=""></textarea>
              </div>
                <div id="new_answer_button">
                <div class="col-lg-4">
                <br>  
                  <button type="button" class="btn btn-outline btn-success" id="save-answer" value="">Save</button>
                </div>
              </div>  
            </div>
            <br>
          </div>
         

        </div>   
      </div>
      <div class="modal-footer" id="buttonarea">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
                            
<!-- JQuery Handlers for the Edit List Modal -->
<!-- Uses Ajax to provide asynchronous handling of the look up and modification of the edit -->
<!-- list modal. Each function will refresh the list after the desired function has finished. -->

<script type="text/javascript">
// Handles onClick for "Save" on the modification list. 
$(document).ready(function(){
  $('body').unbind().on('click','.btn.btn-outline.btn-success.save', function(){
    var answerid = $(this).val();   
    var response_data; 
    var questionid = $("#edit_list").val();
    var answer_el = "#a"+answerid;
    var answertext = $(answer_el).val();
$.when( 
    $.post("/tip/edit/modify",
        {question_id: questionid, answer_id: answerid, answer_text: answertext},
        function(post_data, textStatus, jqXHR)
        {
        
        }),
      $.getJSON("/tip/edit/"+questionid, function(get_data, status){
      response_data = get_data;
      })    

).done(function(){

    $("#answer_area").empty();
      $.each(response_data, function(key, value) {
      
        var add =  '<div class="row"><div class="col-lg-8"><textarea style="width:100%" id="a'+this.answer_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.answer_text+'</textarea></div><div class="col-lg-4"><button type="button" class="btn btn-outline btn-success save" value="'+this.answer_id+'" name="save" >Save</button>  <button type="button" class="btn btn-outline btn-danger delete" value="'+this.answer_id+'" name="inactivate">Delete</button></div></div><br>';
          $("#answer_area").append(add);
       
    });  
  
});
});
});
// Handles onClick for the Delete button. 
$(document).ready(function(){
   $("#answer_area").unbind().on("click",'.btn.btn-outline.btn-danger.delete',function(){
    var answerid = $(this).val();
    var questionid = $("#edit_list").val();
$.when( 
    $.post("/tip/edit/inactivate",
        {question_id: questionid, answer_id: answerid},
        function(post_data, textStatus, jqXHR)
        {
        
        }),
      $.getJSON("/tip/edit/"+questionid, function(get_data, status){
      response_data = get_data;
      })    

).done(function(){

    $("#answer_area").empty();
      $.each(response_data, function(key, value) {
      
        var add =  '<div class="row"><div class="col-lg-8"><textarea style="width:100%" id="a'+this.answer_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.answer_text+'</textarea></div><div class="col-lg-4"><button type="button" class="btn btn-outline btn-success save" value="'+this.answer_id+'" name="save" >Save</button>  <button type="button" class="btn btn-outline btn-danger delete" value="'+this.answer_id+'" name="inactivate">Delete</button></div></div><br>';
          $("#answer_area").append(add);
       
    });  
  
});

});    
});

// Handles onClick for Save a new list item. 
$(document).ready(function(){
    $("#new_answer_button").unbind().on("click",'#save-answer',function(){
      var questionid = $("#edit_list").val();
      var new_answer_text = $("#new_answer").val();
     $.when( 
        $.post("/tip/edit/add",
            {question_id: questionid, answer_text: new_answer_text},
            function(post_data, textStatus, jqXHR)
            {
            
            }),
          $.getJSON("/tip/edit/"+questionid, function(get_data, status){
          response_data = get_data;
          })    
    
    ).done(function(){
        
        $("#answer_area").empty();
          $.each(response_data, function(key, value) {
          
            var add = '<div class="row"><div class="col-lg-8"><textarea style="width:100%" id="a'+this.answer_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.answer_text+'</textarea></div><div class="col-lg-4"><button type="button" class="btn btn-outline btn-success save" value="'+this.answer_id+'" name="save" >Save</button>  <button type="button" class="btn btn-outline btn-danger delete" value="'+this.answer_id+'" name="inactivate">Delete</button></div></div><br>';
              $("#answer_area").append(add);
           
        });  
      $("#new_answer").val("");
    });
           
    });
  
});
// Provides the initial list lookup when the modal is opened.
$(document).ready(function(){
    $("#editAnswerListModal").unbind().on("show.bs.modal",function(e){
            var question_id = e.relatedTarget.value;
            
            if(question_id) {
                 $.ajax({
                    url: '/tip/edit/'+question_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
      
                      $("#answer_area").empty();
                        $.each(data, function(key, value) {
                        var add = '<div class="row"><div class="col-lg-8"><textarea style="width:100%" id="a'+this.answer_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.answer_text+'</textarea></div><div class="col-lg-4"><button type="button" class="btn btn-outline btn-success save" value="'+this.answer_id+'" name="save" >Save</button>  <button type="button" class="btn btn-outline btn-danger delete" value="'+this.answer_id+'" name="inactivate">Delete</button></div></div><br>';
                        $("#answer_area").append(add);
                        });
                    }
                });
            }else{
                $('#answer_area').append("Connection Error. Please reload Page");
                
            }
    });
});
</script>
