<div class="modal fade" id="editDivisionListModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Division List</h5>
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
          <div id="division">
            <div class="row">
            <div class="col-md-6"><h4>Division Name:</h4></div>
            <div class="col-md-6"><h4>Acronym:</h4></div>
            </div>
          <div id="division_area">
          </div>
         </div>
          <hr>
          <div id='new_division_area'>
            <div class="row">
              <div class="col-lg-6">
                <label for="new_division">Add a New Division:</label>
                <textarea style="width:100%" id="new_name" style="font-weight:bold" style="font-size =lg" class="text-area" value=""></textarea>

              </div>
                <div id="new_division_button">
                <div class="col-lg-6">
                <br>
                  <input type=text style="width: 75px" id="new_abbr" name="division_abbr"> 
                  <button type="button" class="btn btn-outline btn-success" id="save-division">Save</button>
                </div>
              </div>  
            </div>
            <br>
          </div>
         

        </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!-- JQuery Handlers for the Edit Division List Modal -->
<!-- Uses Ajax to provide asynchronous handling of the look up and modification of the edit division -->
<!-- list modal. Each function will refresh the list after the desired function has finished. -->
<script type="text/javascript">
// Handles population of the list when the modal is openned. 
$(document).ready(function(){
    $("#editDivisionListModal").unbind().on("show.bs.modal",function(){
                 $.ajax({
                    url: '/division/edit',
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
      
                      $("#division_area").empty();
                        $.each(data, function(key, value) {
                        var add = '<div class="row"><div class="col-lg-6"><textarea style="width:100%" id="dn'+this.division_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.division_name+'</textarea></div><div class="col-lg-6"><input type=text style="width: 75px" id="da'+this.division_id+'" name="division_abbr" value="'+this.abbr+'"> <button type="button" class="btn btn-outline btn-success save-division" value="'+this.division_id+'">Save</button> <button type="button" class="btn btn-outline btn-danger delete" value="'+this.division_id+'" name="inactivate">Delete</button></div></div><br>';
                        $("#division_area").append(add);
                        });
                    }
                });
    });
});
// Handles save modified division onClick 
$(document).ready(function(){
 
  $('#division_area').unbind().on("click",'.btn.btn-outline.btn-success.save-division',function(){
 
    var division_id = $(this).val();
    var response_data;
    var division_n = "#dn"+division_id;
    var division_a = "#da"+division_id;
    var division_name = $(division_n).val();
    var division_abbr = $(division_a).val();
  
$.when( 
    $.post("/division/edit/modify",
        {division_id: division_id, division_name: division_name, abbr: division_abbr},
        function(post_data, textStatus, jqXHR)
        {
        
        }),
      $.getJSON("/division/edit", function(get_data, status){
      response_data = get_data;
      })    

).done(function(){

    $("#division_area").empty();
      $.each(response_data, function(key, value) {
      
        var add = '<div class="row"><div class="col-lg-6"><textarea style="width:100%" id="dn'+this.division_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.division_name+'</textarea></div><div class="col-lg-6"><input type=text style="width: 75px" id="da'+this.division_id+'" name="division_abbr" value="'+this.abbr+'"> <button type="button" class="btn btn-outline btn-success save-division" value="'+this.division_id+'">Save</button> <button type="button" class="btn btn-outline btn-danger delete" value="'+this.division_id+'" name="inactivate">Delete</button></div></div><br>';
          $("#division_area").append(add);
       
    });  
  
});

});
});
// Handles delete onClick
$(document).ready(function(){
 
  $("#division").unbind().on("click",'.btn.btn-outline.btn-danger.delete',function(){
    var division_id = $(this).val();
    var response_data;
$.when( 
    $.post("/division/edit/inactivate",
        {division_id: division_id},
        function(post_data, textStatus, jqXHR)
        {
        
        }),
      $.getJSON("/division/edit", function(get_data, status){
      response_data = get_data;
      })    

).done(function(){

    $("#division_area").empty();
      $.each(response_data, function(key, value) {
      
        var add = '<div class="row"><div class="col-lg-6"><textarea style="width:100%" id="dn'+this.division_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.division_name+'</textarea></div><div class="col-lg-6"><input type=text style="width: 75px" id="da'+this.division_id+'" name="division_abbr" value="'+this.abbr+'"> <button type="button" class="btn btn-outline btn-success save-division" value="'+this.division_id+'">Save</button> <button type="button" class="btn btn-outline btn-danger delete" value="'+this.division_id+'" name="inactivate">Delete</button></div></div><br>';
          $("#division_area").append(add);
       
    });
  
});

});    
});
// Handles save a new division onClick.
$(document).ready(function(){
    $("#new_division_button").unbind().on("click",'#save-division',function(){
      var new_division_name = $("#new_name").val();
      var new_division_abbr = $('#new_abbr').val();
     $.when( 
        $.post("/division/edit/add",
            {division_name: new_division_name, abbr: new_division_abbr},
            function(post_data, textStatus, jqXHR)
            {
            
            }),
          $.getJSON("/division/edit/", function(get_data, status){
          response_data = get_data;
          })    
    
    ).done(function(){
        
        $("#division_area").empty();
          $.each(response_data, function(key, value) {
          
            var add = '<div class="row"><div class="col-lg-6"><textarea style="width:100%" id="dn'+this.division_id+'" style="font-weight:bold" style="font-size =lg" class="text-area" >'+this.division_name+'</textarea></div><div class="col-lg-6"><input type=text style="width: 75px" id="da'+this.division_id+'" name="division_abbr" value="'+this.abbr+'"> <button type="button" class="btn btn-outline btn-success save-division" value="'+this.division_id+'">Save</button> <button type="button" class="btn btn-outline btn-danger delete" value="'+this.division_id+'" name="inactivate">Delete</button></div></div><br>';
              $("#division_area").append(add);
           
        });  
      $("#new_name").val("");
      $("#new_abbr").val("");
    });
           
    });
  
});
</script>