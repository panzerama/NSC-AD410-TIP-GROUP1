<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                        <span class="clear">
                            <span class="block m-t-xs">
				<img src="/images/nsc_logo_t.png" height="64" width="64">
                                <strong class="font-bold" color="white">Michael Fraser</strong>
                            </span> 
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="/images/nsc_logo.png" height="64" width="64"> 
                </div>
            </li>
            <li class="{{ isActiveRoute('reports') }}">
                <a href="{{ url('/reports') }}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Reports</span> </a>
                <ul class="nav nav-second-level collapse in">
                    <li class="active">
                        <a href="#">Report Filters<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level collapse in">
                            <li class="">
                                <a href="#"><h5>Quarter</h5></a>
                                <ul class="nav nav-third-level collapse selected-filter-child" style="height: 0px;">
                                    <form name="report-filter" method="post" action="/report-new">
                                    <!-- By Quarter -->
                                    <label class="filter-ui-label">From:</label>
                                    <select class="form-control filter-ui-right" name="qtr-start">
                                        <option>Spring 2017</option>
                                        <option>Summer 2017</option>
                                        <option>Fall 2017</option>
                                        <option>Winter 2017</option>
                                        <option>Spring 2018</option>
                                        <option>Summer 2018</option>
                                        <option>Fall 2018</option>
                                        <option>Winter 2018</option>
                                    </select>
                                
                                    <label class="filter-ui-label">To:</label>
                                    <select class="form-control filter-ui-right" name="qtr-end">
                                        <option>Spring 2017</option>
                                        <option>Summer 2017</option>
                                        <option>Fall 2017</option>
                                        <option>Winter 2017</option>
                                        <option>Spring 2018</option>
                                        <option>Summer 2018</option>
                                        <option>Fall 2018</option>
                                        <option>Winter 2018</option>
                                    </select>
                                </ul>
                           </li>
                    </li>
                    <li>
                        <a><h5>Tips</h5></a>
                        <ul class="nav nav-third-level collapse selected-filter-child" style="height: 0px;">
                            <label class="filter-ui-label">Tip:</label>
                                <select class="form-control filter-ui-right filter-ui-select-small" name="selection-tip">
                                    <option>Spring 2017 Tip</option>
                                    <option>Lorem Ipsum</option>
                                </select>
                            <label class="filter-ui-label" name="division">Division:</label>
                                <select class="form-control filter-ui-right filter-ui-select-small" name="selection-division">
                                    <option>Div A</option>
                                    <option>Div B</option>
                                    <option>Div C</option>
                                    <option>Div E</option>
                                    <option>Div F</option>
                                </select>
                            <label class="filter-ui-label">Course:</label>
                                <select class="form-control filter-ui-right filter-ui-select-small" name="selection-course">
                                    <option>Course A</option>
                                    <option>Course B</option>
                                    <option>Course C</option>
                                    <option>Course E</option>
                                    <option>Course F</option>
                                </select>
                            <div class="filter-ui-radio">
                                <div class="radio radio-info">
                                    <input type="radio" id="single-tips" value="single-tips" name="tip-type">
                                    <label for="single-tips">Single</label>
                                </div>
                                <div class="radio radio-info ">
                                    <input type="radio" id="group-tips" value="group-tips" name="tip-type" >
                                    <label for="group-tips">Group</label>
                                </div>
                                <div class="radio radio-info">
                                    <input type="radio" id="all-tips" value="all-tips" name="tip-type" checked="">
                                    <label for="all-tips">All</label>
                                </div>
                            </div>
                        </ul>
                    </li>
                        <li>
                            <a href="#"><h5>Question / Response</h5></a>
                            <ul class="nav nav-third-level collapse selected-filter-child" style="height: 0px;">
                                <label class="filter-ui-label">Question:</label>
                                    <select class="form-control nav-full-width" name="question">
                                        <option>What is the problem or lesson that you identified and will be discussing in this TIP? No topic is too big or too small. All are welcomed!</option>
                                        <option>What is the course-level objective that this TIP best addresses?</option>
                                        <option>Which of the college-wide Essential Learning Outcomes does your TIP most closely address? (select one)</option>
                                        <option>Which of the following best describes the evidence you found for the problem. (select one)</option>
                                        <option>Please describe more specifically how you identified the problem.</option>
                                        <option>Please select the change that best fits what you did to try to address the problem.  (select one)</option>
                                        <option>Specifically, what did you do to address the problem?</option>
                                        <option>Please select the evidence that best fits how you assessed the impact of the change you made. (select one)</option>
                                        <option>Please describe more fully how you assessed the impact of the change you made.</option>
                                        <option>What new opportunities did you consider as a result of identifying this problem and making this change?</option>
                                        <option>What else would you like to share about the teaching improvement process you engaged in this quarter?</option>
                                        <option>TIP data will be shared de-identified and in aggregate. Would you like to share specifics?</option>
                                       
                                    </select>
                                    
                                <label class="filter-ui-label">Response:</label>
                                    <select class="form-control nav-full-width" name="selection-division">
                                        <option>- Text -</option>
                                        <option>Dynamic Option 1</option>
                                        <option>Dynamic Option 2</option>
                                        <option>Dynamic Option 3</option>
                                        <option>Dynamic Option 4</option>
                                    </select>
                                <label class="filter-ui-label nav-full-width">Search  By Keyword(s):</label>
                                    <input type="text" class="form-control nav-full-width" style="margin-bottom: 10px;">
                            </ul>
                        </li>
                        <li>
                           <a class="report_submit_button"><button class="btn btn-primary btn-block">Search</button></a>
                        </li>
                        </form>
                    </ul>
                    </li>
                    <li class="">
                            <a href="#">Saved Reports <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level collapse " style="height: 0px;">
                                <li>
                                    <a href="#">Saved Report 1</a>
                                </li>
                                <li>
                                    <a href="#">Saved Report 2</a>
                                </li>
                                <li>
                                    <a href="#">All</a>
                                </li>
                            </ul>
                        </li>
                    </li>
                </ul>
            </li>
            <li class="{{ isActiveRoute('admin/create') }}">
                <a href="{{ url('/admin/create') }}"><i class="fa fa-th"></i> <span class="nav-label">Admin Management</span></a>
            </li>
            <li class="{{ isActiveRoute('tip/edit') }}">
                <a href="{{ url('/tip/edit') }}"><i class="fa fa-table"></i> <span class="nav-label">TIPS Management</span> </a>
            </li>
            <li class="{{ isActiveRoute('admin/show') }}">
                <a href="{{ url('/admin/show') }}"><i class="fa fa-star"></i> <span class="nav-label">Inactivate User</span> </a>
            </li>
            
        </ul>
    </div>
    
</nav>

