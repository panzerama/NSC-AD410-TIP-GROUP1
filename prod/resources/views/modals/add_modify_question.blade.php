<!-- Add/Modify a Question Modal -->
<div class="modal fade" id="addBeforeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                 <form method="post" action="/tip/edit">
                <!--  send a token with the form for Laravel to validate - to confirm this is the form that is on the server for the website to prevent people to make forms and inject forms/data    -->
                {{ csrf_field() }}
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_edit_modal"></h4>
  
            </div>   <!-- end div class modal header  -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="title">Question Type:</label>
                    <select name="question_type" id="type" class="form-control" style="width:200px" onchange="change_fields()">
                        <option value="text_box">TEXT-BOX</option>
                        <option value="scrolling_text_box">SCROLLING TEXT-BOX</option>
                        <option value="drop_down_list">DROPDOWN LIST</option>
                        <option value="checkbox">CHECKBOXES</option>
                        <option value="radio_button">RADIO BUTTONS</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question_text">Question:</label>
                    <textarea style="width:100%" style="font-weight:bold" style="font-size=lg" class="text-area" id="question_text" name="question_text" > </textarea>
                </div>
                <div class="form-group">
                    <label for="question_desc">Example:</label>
                    <textarea style="width:100%" style="font-weight:bold" style="font-size=lg" class="text-area" id="question_desc" name="question_desc"> </textarea>
                </div>

<!--  *********************************************************************************  -->

<!--  ***********************************************************************     -->
            </div>  <!-- end div modal body -->
            <div class="modal-footer">
                <input type="hidden" id="add_edit_info" name="" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary"> Save changes</button>
            </form>    
            </div>  <!-- end modal footer -->
        </div>   <!-- end div class="modal-content"  -->
    </div>  <!-- end div class="modal-dialog"  -->
</div>  <!-- end div class="modal fade"  -->