@extends('layouts.admin-reports-app')

@section('title', 'TIPS Admin')

@section('content')
<!-- {{ var_dump($data['table_data']) }} -->
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
   
    <div class="row filter-content" style="display: none;">
        <div class="col-lg-12">
            <form name="report-filter" method="post" action="/reports/filter">
                {{ csrf_field() }}
                <div id="filter-quarter" class="float full-width">
                    <div class="filter-form-group filter-ui-left">
                        <label class="filter-ui-label">From:</label>
                        <select class="form-control filter-ui-right" name="quarter-start">
                                <option>---</option>
                                @foreach ($form_options['start_date_options'] as $option)
                                    @if ($option[1])
                                        <option selected>{{ $option[0] }}</option>
                                    @else
                                        <option>{{ $option[0] }}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div> <!-- END filter-form-group -->
                    
                    <div class="filter-form-group filter-ui-right">                        
                        <label class="filter-ui-label">To:</label>
                        <select class="form-control filter-ui-right" name="quarter-end">
                                <option>---</option>
                                @foreach ($form_options['end_date_options'] as $option)
                                    @if ($option[1])
                                        <option selected>{{ $option[0] }}</option>
                                    @else
                                        <option>{{ $option[0] }}</option>
                                    @endif
                                @endforeach
                        </select>
                    </div> <!-- END filter-form-group -->
                </div> <!-- END filter-quarter -->
                
                <div id="filter-faculty" class="float full-width">
                    <div class="filter-form-group filter-ui-left"> 
                        <label class="filter-ui-label" name="division">Division:</label>
                        <select class="form-control filter-ui-right" name="division">
                                <option>All</option>
                                @foreach  ($form_options['division_options'] as $option)
                                    @if ($option[1])
                                        <option selected>{{ $option[0] }}</option>
                                    @else
                                        <option>{{ $option[0] }}</option>
                                    @endif 
                                @endforeach
                        </select>
                    </div> <!-- END filter-form-group -->
                    
                    <div class="filter-form-group filter-ui-right"> 
                        <label class="filter-ui-label">Course:</label>
                        <select class="form-control filter-ui-right" name="course">
                                <option>All</option>
                                @foreach  ($form_options['course_options'] as $option)
                                    @if ($option[1])
                                        <option selected>{{ $option[0] }}</option>
                                    @else
                                        <option>{{ $option[0] }}</option>
                                  @endif 
                                @endforeach
                        </select>
                    </div> <!-- END filter-form-group -->
                </div><!-- filter-faculty -->
                
                <div id="filter-radio" class="full-width filter-ui-radio">
                        <div class="radio radio-info report-filter-radio filter-ui-left">
                            <input type="radio" id="single-tips" value="single-tips" name="type">
                            <label for="single-tips">Single</label>
                        </div>
                        <div class="radio radio-info report-filter-radio filter-ui-left">
                            <input type="radio" id="group-tips" value="group-tips" name="type" >
                            <label for="group-tips">Group</label>
                        </div>
                        <div class="radio radio-info report-filter-radio filter-ui-left">
                            <input type="radio" id="all-tips" value="all-tips" name="type" checked="">
                            <label for="all-tips">All</label>
                        </div>
                </div>

                
                <div id="filter-question">
                    <label class="filter-ui-label">Question:</label>
                    <select class="form-control full-width" name="question">
                            <option>All</option>
                            @foreach ($form_options['question_options'] as $option)
                                @if ($option[1])
                                    <option selected>{{ $option[0] }}</option>
                                @else
                                    <option>{{ $option[0] }}</option>
                               @endif 
                            @endforeach
                    </select>
                    
                    <label class="filter-ui-label full-width">Search Answer By Keyword(s):</label>
                    <input type="text" class="form-control full-width" style="margin-bottom: 10px;" name="keyword"
                        placeholder="{{ $form_options['keyword'] }}">
                </div><!-- END filter-question -->
               <a class="report_submit_button"><button class="btn btn-primary btn-block">Search</button></a>
            </form>
        </div>
    </div>
    <div id="filter-display-controls">
        <span class="expand-filter">Show / Hide Filters</span>
    </div>
</div>

<div class="row">
        <!-- debugging -->
<!--{{ print_r($data) }}-->
</div> 


<div class="wrapper wrapper-content">   
<div class="row">
            <div class="col-lg-6">
                    @include('reports.summary')
                    @include('reports.tips-by-month')
            </div>

            <div class="col-lg-6">
                    @include('reports.tips-by-division')
  <div class="row">
                     <div class="col-lg-6">
                    @include('reports.type-of-change')
                </div>
                <div class="col-lg-6">
                    @include('reports.new-opportunities')
                </div>
                </div>  
            </div>
</div>     

<div class="row">
            <div class="col-lg-4">
                    @include('reports.evidence-change-needed')
                 </div>
                <div class="col-lg-4">
                    @include('reports.how-impact-assessed')
                </div>
                <div class="col-lg-4">
                     @include('reports.primary-elo-added')
                </div>  
</div> 

 <div class="row">
<div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>TIPS Data</h5>
                    </div>
    
    <div class="ibox-content">
        <div class="table-responsive">
            <table id="tips_data" class="table table-striped table-bordered table-hover dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Tips ID</th>
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
<script src="https://html2canvas.hertzen.com/build/html2canvas.js"></script>

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
    var t = $('#tips_data').DataTable({
         "order": [[ 10, "desc" ]],
        dom: '<"pull-left"l><"pull-right"B><f>rtip',
        "buttons": ['colvis', 'copy', 'csv', 'excel', 'pdf', 'print'   ],
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "data": theData.data,
        "columnDefs": [
            {
                "targets": [0],
                "visible": false,
                "searchable": false
            }],
        "columns": [
            {"data": "tips_id"},
            {"data": "abbr" },
            {"data": "faculty_name" },
            {"data": "email" },
            {"data": "employee_type" },
            {"data": "course_number" },
            {"data": "quarter" },
            {"data": "year" },
            {"data": "is_group",
            "render": function (data, type, row) {
                if (data > 0) {
                    return "group";
                } return "individual" }},
            {"data": "is_finished",
            "render": function (data, type, row) {
                if (data > 0) {
                    return "completed";
                } return "in-progress";}},
            {"data": "created_at" },
            {"data": "updated_at" },
        ]
    });
} );

$('.expand-filter').click(function(){
    $('.filter-content').slideToggle('slow');
});
</script>
@stop
