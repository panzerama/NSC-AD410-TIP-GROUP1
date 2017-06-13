<!-- Add/Modify a Question Modal -->
<div class="modal fade" id="addBeforeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
<!--  ********************************************************************************* -->
<!--  *************************  display the header  ********************************** -->
<!--  ********************************************************************************* -->
            
            <div class="modal-header">
                <form name="add_mod_form" method="post" action="/tip/edit">
                <!--  send a token with the form for Laravel to validate - to confirm this is the form that is on the server for the website to prevent people to make forms and inject forms/data    -->
                {{ csrf_field() }}
                <!-- x button in upper right corner -->
                <button type="button" class="close" data-dismiss="modal" onclick="clear_options()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_edit_modal"></h4>
            </div>   <!-- end div class modal header  -->
<!--  ********************************************************************************* -->
<!--  *************************  display the body    ********************************** -->
<!--  ********************************************************************************* -->
            <div class="modal-body">
                <div class="form-group">
                    <label for="question_text">Question:</label>
                    <textarea style="width:100%" style="font-weight:bold" style="font-size=lg" class="text-area" id="question_text" name="question_text"> </textarea>
                </div>
                <div class="form-group">
                    <label for="question_desc">Example:</label>
                    <textarea style="width:100%" style="font-weight:bold" style="font-size=lg" class="text-area" id="question_desc" name="question_desc"> </textarea>
                </div>
                <div class="form-group">
                    <div id="type_drop_down">
                    <label for="q_type">Question Type:</label>
                    <select name="q_type" id="q_type" class="form-control" style="width:200px" onchange="java_script_:change_options(this.options[this.selectedIndex].value)">
                        <option value="text_box">TEXT-BOX</option>
<!--                        <option value="scrolling_text_box">SCROLLING TEXT-BOX</option>    -->
                        <option value="drop_down_list">DROPDOWN LIST</option>
                        <option value="check_box">CHECKBOXES</option>
                        <option value="radio_button">RADIO BUTTONS</option>
                    </select>
                    </div>
                </div>  <!-- end of form-group for question type drop down   -->
                
<!--  ********************************************************************************* -->
<!--  *************************  display textarea boxes if the question type  ********* -->
<!--  ******************* selected is radio button, checkbox, or dropdown list ******** -->
<!--  ********************************************************************************* -->
                <div class="form-group">  
                    <label id="a_rb_label" for="a_rb_options" style="width:100%"></label>
                    <div id="a_rb_options" style="display: none;">  
                                <textarea id="a_rb0" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_rb1" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_rb2" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_rb3" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_rb4" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_rb5" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                    </div>           <!-- end of a_options -->
                    <label id="a_cb_label" for="a_cb_options" style="width:100%"></label>
                    <div id="a_cb_options" style="display: none;">  
                                <textarea id="a_cb0" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_cb1" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_cb2" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_cb3" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_cb4" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_cb5" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                    </div>           <!-- end of a_options -->
                    <label id="a_ddl_label" for="a_ddl_options" style="width:100%"></label>
                    <div id="a_ddl_options" style="display: none;"> 
                                <textarea id="a_ddl0" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl1" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl2" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl3" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl4" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl5" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl6" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl7" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl8" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl9" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl10" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl11" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl12" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl13" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                                <textarea id="a_ddl14" style="width:100%" style="font-weight:bold" style="font-size =lg" class="text-area" name="a_d[]"> </textarea>
                    </div>   <!-- end of div for a-more-options -->
                </div>  <!-- end of form-group for a_more_options   -->
            </div>  <!-- end div modal body -->

            <!-- ********** begin script to display additional text boxes depending on question type option selected ********** -->
                <script language = "javascript">
                function change_options(q_type_selected)
                   {

                    // the question type selected is passed in to the function
                    // get the label and option div's for dropdown list, checkbox and radio button
                    var ddl_l = document.getElementById('a_ddl_label');
                    var ddl_o = document.getElementById('a_ddl_options');

                    var cb_l = document.getElementById('a_cb_label');
                    var cb_o = document.getElementById('a_cb_options');

                    var rb_l = document.getElementById('a_rb_label');
                    var rb_o = document.getElementById('a_rb_options');

                    // determine the question type selected and display accordingly                
                    switch(q_type_selected){
                        case 'drop_down_list':
                            // hide radio buttons label div
                            rb_l.style.display='none';
                            // hide radio button options div
                            rb_o.style.display='none';
                            // hide checkbox label div
                            cb_l.style.display = 'none';
                            // hide checkbox options div
                            cb_o.style.display = 'none';
                            // clear radio button label text
                            document.getElementById('a_rb_label').innerHTML="";
                            // clear checkbox label text
                            document.getElementById('a_cb_label').innerHTML="";

                            // display drop down label div
                            ddl_l.style.display='inline-block';
                            // display drop down label text
                            document.getElementById('a_ddl_label').innerHTML="Input up to 15 Drop-Down List Options:";
//                          document.getElementById('a_ddl_label').innerHTML = "Input up to 15 Drop-Down List Options:";

                            // display drop down options div
                            ddl_o.style.display='inline-block';

                            // clear the options textboxes from any previous entries
//                            document.getElementById('a_text').innerHTML="";
                            // clear the options textboxes from any previous entries
                            document.getElementById('a_cb0').value = "";
                            document.getElementById('a_cb1').value = "";
                            document.getElementById('a_cb2').value = "";
                            document.getElementById('a_cb3').value = "";
                            document.getElementById('a_cb4').value = "";
                            document.getElementById('a_cb5').value = "";
        
                            document.getElementById('a_rb0').value = "";
                            document.getElementById('a_rb1').value = "";
                            document.getElementById('a_rb2').value = "";
                            document.getElementById('a_rb3').value = "";
                            document.getElementById('a_rb4').value = "";
                            document.getElementById('a_rb5').value = "";
        
                            document.getElementById('a_ddl0').value = "";
                            document.getElementById('a_ddl1').value = "";
                            document.getElementById('a_ddl2').value = "";
                            document.getElementById('a_ddl3').value = "";
                            document.getElementById('a_ddl4').value = "";
                            document.getElementById('a_ddl5').value = "";
                            document.getElementById('a_ddl6').value = "";
                            document.getElementById('a_ddl7').value = "";
                            document.getElementById('a_ddl8').value = "";
                            document.getElementById('a_ddl9').value = "";
                            document.getElementById('a_ddl10').value = "";
                            document.getElementById('a_ddl11').value = "";
                            document.getElementById('a_ddl12').value = "";
                            document.getElementById('a_ddl13').value = "";
                            document.getElementById('a_ddl14').value = "";
                            break;
                        case 'check_box':
                            // hide radio buttons label div
                            rb_l.style.display='none';
                            // hide radio button options div
                            rb_o.style.display='none';
                            // hide dropdown list label div
                            ddl_l.style.display = 'none';
                            // hide dropdown list options div
                            ddl_o.style.display = 'none';
                            // clear radio button label text
                            document.getElementById('a_rb_label').innerHTML="";
                            // clear dropdown list label text
                            document.getElementById('a_ddl_label').innerHTML="";

                            // display check box label div
                            cb_l.style.display='inline-block';
                            // display the checkbox label text
                            document.getElementById('a_cb_label').innerHTML="Input up to 6 Check Box Options:";
//                          document.getElementById('a_cb_label').innerHTML = "Input up to 6 Check Box Options:";

                            // display checkbox options div
                            cb_o.style.display='inline-block';

                            // clear the options textboxes from any previous entries
//                            document.getElementById('a_text').innerHTML="";
                            // clear the options textboxes from any previous entries
                            document.getElementById('a_cb0').value = "";
                            document.getElementById('a_cb1').value = "";
                            document.getElementById('a_cb2').value = "";
                            document.getElementById('a_cb3').value = "";
                            document.getElementById('a_cb4').value = "";
                            document.getElementById('a_cb5').value = "";
        
                            document.getElementById('a_rb0').value = "";
                            document.getElementById('a_rb1').value = "";
                            document.getElementById('a_rb2').value = "";
                            document.getElementById('a_rb3').value = "";
                            document.getElementById('a_rb4').value = "";
                            document.getElementById('a_rb5').value = "";
        
                            document.getElementById('a_ddl0').value = "";
                            document.getElementById('a_ddl1').value = "";
                            document.getElementById('a_ddl2').value = "";
                            document.getElementById('a_ddl3').value = "";
                            document.getElementById('a_ddl4').value = "";
                            document.getElementById('a_ddl5').value = "";
                            document.getElementById('a_ddl6').value = "";
                            document.getElementById('a_ddl7').value = "";
                            document.getElementById('a_ddl8').value = "";
                            document.getElementById('a_ddl9').value = "";
                            document.getElementById('a_ddl10').value = "";
                            document.getElementById('a_ddl11').value = "";
                            document.getElementById('a_ddl12').value = "";
                            document.getElementById('a_ddl13').value = "";
                            document.getElementById('a_ddl14').value = "";
                            break;
                        case 'radio_button':
                            // hide checkbox label div
                            cb_l.style.display='none';
                            // hide checkbox options div
                            cb_o.style.display='none';
                            // hide dropdown list label div
                            ddl_l.style.display = 'none';
                            // hide dropdown list options div
                            ddl_o.style.display = 'none';
                            // clear checkbox label text
                            document.getElementById('a_cb_label').innerHTML="";
                            // clear dropdown list label text
                            document.getElementById('a_ddl_label').innerHTML="";

                            // display radio button label div
                            rb_l.style.display='inline-block';
                            // display radio button label text
                            document.getElementById('a_rb_label').innerHTML="Input up to 6 Radio Button Options:";
//                          document.getElementById('a_rb_label').innerHTML = "Input up to 6 Radio Button Options:";

                            // display radio button options div
                            rb_o.style.display='inline-block';

                            // clear the options textboxes from any previous entries
//                            document.getElementById('a_text').innerHTML="";
                          // clear the options textboxes from any previous entries
                            document.getElementById('a_cb0').value = "";
                            document.getElementById('a_cb1').value = "";
                            document.getElementById('a_cb2').value = "";
                            document.getElementById('a_cb3').value = "";
                            document.getElementById('a_cb4').value = "";
                            document.getElementById('a_cb5').value = "";
        
                            document.getElementById('a_rb0').value = "";
                            document.getElementById('a_rb1').value = "";
                            document.getElementById('a_rb2').value = "";
                            document.getElementById('a_rb3').value = "";
                            document.getElementById('a_rb4').value = "";
                            document.getElementById('a_rb5').value = "";
        
                            document.getElementById('a_ddl0').value = "";
                            document.getElementById('a_ddl1').value = "";
                            document.getElementById('a_ddl2').value = "";
                            document.getElementById('a_ddl3').value = "";
                            document.getElementById('a_ddl4').value = "";
                            document.getElementById('a_ddl5').value = "";
                            document.getElementById('a_ddl6').value = "";
                            document.getElementById('a_ddl7').value = "";
                            document.getElementById('a_ddl8').value = "";
                            document.getElementById('a_ddl9').value = "";
                            document.getElementById('a_ddl10').value = "";
                            document.getElementById('a_ddl11').value = "";
                            document.getElementById('a_ddl12').value = "";
                            document.getElementById('a_ddl13').value = "";
                            document.getElementById('a_ddl14').value = "";  
  
                            break;    
                        default:
                            // clear the options textboxes
//                            document.getElementById('a_text').innerHTML="";
                            // hide drop down label div
                            ddl_l.style.display='none';
                            // hide drop down options div
                            ddl_o.style.display='none';
                            // hide radio buttons label div
                            rb_l.style.display='none';
                            // hide radio button options div
                            rb_o.style.display='none';
                            // hide checkbox label div
                            cb_l.style.display = 'none';
                            // hide checkbox options div
                            cb_o.style.display = 'none';
                            // clear drop down label text
                            document.getElementById('a_ddl_label').innerHTML="";
                            // clear radio button label text
                            document.getElementById('a_rb_label').innerHTML="";
                            // clear checkbox label text
                            document.getElementById('a_cb_label').innerHTML="";
                            // clear the options textboxes from any previous entries
                            document.getElementById('a_cb0').value = "";
                            document.getElementById('a_cb1').value = "";
                            document.getElementById('a_cb2').value = "";
                            document.getElementById('a_cb3').value = "";
                            document.getElementById('a_cb4').value = "";
                            document.getElementById('a_cb5').value = "";
        
                            document.getElementById('a_rb0').value = "";
                            document.getElementById('a_rb1').value = "";
                            document.getElementById('a_rb2').value = "";
                            document.getElementById('a_rb3').value = "";
                            document.getElementById('a_rb4').value = "";
                            document.getElementById('a_rb5').value = "";
        
                            document.getElementById('a_ddl0').value = "";
                            document.getElementById('a_ddl1').value = "";
                            document.getElementById('a_ddl2').value = "";
                            document.getElementById('a_ddl3').value = "";
                            document.getElementById('a_ddl4').value = "";
                            document.getElementById('a_ddl5').value = "";
                            document.getElementById('a_ddl6').value = "";
                            document.getElementById('a_ddl7').value = "";
                            document.getElementById('a_ddl8').value = "";
                            document.getElementById('a_ddl9').value = "";
                            document.getElementById('a_ddl10').value = "";
                            document.getElementById('a_ddl11').value = "";
                            document.getElementById('a_ddl12').value = "";
                            document.getElementById('a_ddl13').value = "";
                            document.getElementById('a_ddl14').value = "";
                            break;
                    }
                }
                </script> 
            <!-- ********** end of script to display additional text boxes depending on question type option selected ********** -->

            <div class="modal-footer">
                <input type="hidden" id="add_edit_info" name="" value="">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="clear_options()">Cancel</button>
                
                <!-- ********** begin script to clear-reset fields if cancel is selected ********** -->
                <script language = "javascript">
                function clear_options()
                {
                    document.getElementById('question_text').value="";
                    document.getElementById('question_desc').value="";
                    document.getElementById('q_type').value="text_box";

                    // get the label and option div's for dropdown list, checkbox and radio button
                    var ddl_l = document.getElementById('a_ddl_label');
                    var ddl_o = document.getElementById('a_ddl_options');

                    var cb_l = document.getElementById('a_cb_label');
                    var cb_o = document.getElementById('a_cb_options');

                    var rb_l = document.getElementById('a_rb_label');
                    var rb_o = document.getElementById('a_rb_options');

                    // hide drop down label div
                    ddl_l.style.display='none';
                    // hide drop down options div
                    ddl_o.style.display='none';
                    // hide radio buttons label div
                    rb_l.style.display='none';
                    // hide radio button options div
                    rb_o.style.display='none';
                    // hide checkbox label div
                    cb_l.style.display = 'none';
                    // hide checkbox options div
                    cb_o.style.display = 'none';
                    // clear drop down label text
                    document.getElementById('a_ddl_label').innerHTML="";
                    // clear radio button label text
                    document.getElementById('a_rb_label').innerHTML="";
                    // clear checkbox label text
                    document.getElementById('a_cb_label').innerHTML="";
                    // clear the options textboxes from any previous entries
                    document.getElementById('a_cb0').value = "";
                    document.getElementById('a_cb1').value = "";
                    document.getElementById('a_cb2').value = "";
                    document.getElementById('a_cb3').value = "";
                    document.getElementById('a_cb4').value = "";
                    document.getElementById('a_cb5').value = "";

                    document.getElementById('a_rb0').value = "";
                    document.getElementById('a_rb1').value = "";
                    document.getElementById('a_rb2').value = "";
                    document.getElementById('a_rb3').value = "";
                    document.getElementById('a_rb4').value = "";
                    document.getElementById('a_rb5').value = "";

                    document.getElementById('a_ddl0').value = "";
                    document.getElementById('a_ddl1').value = "";
                    document.getElementById('a_ddl2').value = "";
                    document.getElementById('a_ddl3').value = "";
                    document.getElementById('a_ddl4').value = "";
                    document.getElementById('a_ddl5').value = "";
                    document.getElementById('a_ddl6').value = "";
                    document.getElementById('a_ddl7').value = "";
                    document.getElementById('a_ddl8').value = "";
                    document.getElementById('a_ddl9').value = "";
                    document.getElementById('a_ddl10').value = "";
                    document.getElementById('a_ddl11').value = "";
                    document.getElementById('a_ddl12').value = "";
                    document.getElementById('a_ddl13').value = "";
                    document.getElementById('a_ddl14').value = "";
                }
                </script> 
                
                <button type="submit" class="btn btn-primary"> Save changes</button>
                
            </form>    

            </div>  <!-- end modal footer -->
        </div>   <!-- end div class="modal-content"  -->
    </div>  <!-- end div class="modal-dialog"  -->
</div>  <!-- end div class="modal fade"  -->