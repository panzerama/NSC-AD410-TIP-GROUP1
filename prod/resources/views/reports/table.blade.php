@extends('layouts.admin-app')

@section('title', 'TIPS Admin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
<h2>Reports Dashboard</h2>
    <ol class="breadcrumb">
        <li>
            <a href="reports">Reports</a>
        </li>
        <li class="active">
            <strong>Data Table</strong>
        </li>
    </ol>
</div>

<div class="row">
        <!-- debugging -->
<!--{{ print_r($data) }}-->
</div> 

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

@endsection

@section('page-js-files')

<!--Import jQuery before export.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>


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
<!--<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.css">-->
 <link rel="stylesheet" href="{!! asset('css/buttons.dataTables.css', true) !!}" />

@stop

@section('page-js-script')
<script type="text/javascript">
var theData = {"data": <?php echo json_encode($data); ?> };
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
    $("#tips_data tbody").on('click', 'tr', function () {
        var completed = t.cell(this, 9).data();
        var id = t.cell(this, 0).data();
        if (completed > 0) {
            window.open('reports/tip/'+id);
        } else {
        alert("TIP not yet completed.");
        }
});
});
</script>
@stop
