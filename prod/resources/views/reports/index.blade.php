@extends('layouts.admin-reports-app')

@section('title', 'TIPS Admin')

@section('content')
<!--<div class="row wrapper border-bottom white-bg page-heading">-->
<!--    {{ print_r($data) }}-->
<!--    <br/>-->
<!--    {{ print_r($form_options) }}-->
<!--</div>-->

<div class="row wrapper border-bottom white-bg page-heading">
        <h2>Reports Dashboard</h2>
    <ol class="breadcrumb">
        <li class="active">
            <strong>Summary Reports</strong>
        </li>
        <li>
            <a href="qareports">Q/A Reports</a>
        </li>
        <li>
            <a href="table">Data Table</a>
        </li>
    </ol>
</div>

<div class="row wrapper border-bottom white-bg page-heading">
    <h2>Filter Data</h2>
    <div class="row">
        <div class="col-lg-12">
            <form name="report-filter" method="post" action="/reports/filter">
                {{ csrf_field() }}
            
                <label class="filter-ui-label">From:</label>
                <select class="form-control filter-ui-right" name="quarter-start">
                        <option selected="selected">---</option>
                    @foreach ($form_options['date_options'] as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
                                            
                <label class="filter-ui-label">To:</label>
                <select class="form-control filter-ui-right" name="quarter-end">
                        <option selected="selected">---</option>
                    @foreach ($form_options['date_options'] as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
                
                <label class="filter-ui-label" name="division">Division:</label>
                <select class="form-control filter-ui-right filter-ui-select-small" name="division">
                        <option selected="selected">All</option>
                    @foreach ($form_options['division_options'] as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
                
                <label class="filter-ui-label">Course:</label>
                <select class="form-control filter-ui-right filter-ui-select-small" name="course">
                        <option selected="selected">All</option>
                    @foreach ($form_options['course_options'] as $option)
                        <option>{{ $option }}</option>
                    @endforeach
                </select>
                                            
                <!--<a><h5>Tips</h5></a>
                <label class="filter-ui-label">Tip:</label>
                <select class="form-control filter-ui-right filter-ui-select-small" name="tip">
                    <option>Spring 2017 Tip</option>
                    <option>Lorem Ipsum</option>
                </select>
            
                <div class="filter-ui-radio">
                    <div class="radio radio-info">
                        <input type="radio" id="single-tips" value="single-tips" name="type">
                        <label for="single-tips">Single</label>
                    </div>
                    <div class="radio radio-info ">
                        <input type="radio" id="group-tips" value="group-tips" name="type" >
                        <label for="group-tips">Group</label>
                    </div>
                    <div class="radio radio-info">
                        <input type="radio" id="all-tips" value="all-tips" name="type" checked="">
                        <label for="all-tips">All</label>
                    </div>
                </div>
            
                <label class="filter-ui-label nav-full-width">Search Answer By Keyword(s):</label>
                <input type="text" class="form-control nav-full-width" style="margin-bottom: 10px;" name="keyword">
            
                <a href="#"><h5>Question / Response</h5></a>
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
                </select>-->
            
               <a class="report_submit_button"><button class="btn btn-primary btn-block">Search</button></a>
            </form>
        </div>
    </div>
</div>

<div class="row">
        <!-- debugging -->
<!--{{ print_r($data) }}-->
</div> 


<div class="wrapper wrapper-content">   
<div class="row">
            <div class="col-lg-6">
                <div class="col-lg-12">
                    <!-- Summary Report -->
                    @include('reports.summary')
                </div>
            
            <div class="col-lg-12">
                    <!-- Tips By Month Report -->

                    @include('reports.tips-by-month')

                </div>
                </div>

            <div class="col-lg-6">
                    <!-- Tips By Division Report -->

                    @include('reports.tips-by-division')
            </div>  
</div>        
</div>

<div class="wrapper wrapper-content">
<div class="row">
    <div class="col-lg-6">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">  
                <div class="row">
                
                    @include('reports.evidence-change-needed')
                    
                    @include('reports.how-impact-assessed')

                </div>
            </div>
        </div>
                
        
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">  
                
                    @include('reports.type-of-change')
                    
                    @include('reports.new-opportunities')
                    
                </div>
            </div>
        </div>
    </div>

        <div class="col-lg-6">
                     @include('reports.primary-elo-added')
        </div>
</div>
</div>  

<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Recent TIPS</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">


        <table id="tips_data" class="table table-striped table-bordered table-hover dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Division</th>
                        <th>Faculty Name</th>
                        <th>Email</th>
                        <th>Employee Type</th>
                        <th>Course Number</th>
                        <th>Quarter</th>
                        <th>Year</th>
                        <th>Group or Individual</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
</div>

<?php
    $tableData = $data['table_data'];
?>

@endsection

@section('page-js-files')

<!--Import jQuery before export.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

    <!--Data Table-->
    <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>

    <!--Export table buttons-->
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
    <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.colVis.min.js"></script>

@stop

@section('page-style-files')
  <!--Export table button CSS-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css">

@stop

@section('page-js-script')
<script type="text/javascript">
var theData = {"data": <?php echo json_encode($tableData); ?> };
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#tips_data').DataTable({
         "order": [[ 10, "desc" ]],
        dom: '<"pull-left"l><"pull-right"B><f>rtip',
     "buttons": ['colvis', 'copy', 'csv', 'excel', 'pdf', 'print'   ],
     "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
   "data": theData.data,
        "columns": [
            /*{"data": "abbr" }, failed during search-branch build - jd*/
            {"data": "faculty_name" },
            {"data": "email" },
            {"data": "employee_type" },
            {"data": "course_number" },
            {"data": "quarter" },
            {"data": "year" },
            {"data": "is_group",
            "render": function (data, type, row) {
                if (data.is_group == 1) {
                    return "group";
                } return "individual";}},
            {"data": "is_finished",
            "render": function (data, type, row) {
                if (data.is_finished == 1) {
                    return "completed";
                } return "in-progress";}},
            {"data": "created_at" },
            {"data": "updated_at" },
        ]
    });
} );
</script>
@stop
