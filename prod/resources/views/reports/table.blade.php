@extends('layouts.admin-reports-app')

@section('title', 'TIPS Admin')

@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
<h2>Reports Dashboard</h2>
    <ol class="breadcrumb">
        <li>
            <a href="reports">Reports</a>
        </li>
        <li>
            <a href="qareports">Q/A Reports</a>
        </li>
        <li class="active">
            <strong>Data Table</strong>
        </li>
    </ol>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>All TIPS</h5>
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
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="html5buttons">
                        <div class="dt-buttons btn-group">
                        <a class="btn btn-default buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Copy</span></a>
                        <a class="btn btn-default buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>CSV</span></a>
                        <a class="btn btn-default buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Excel</span></a>
                        <a class="btn btn-default buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>PDF</span></a>
                        <a class="btn btn-default buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#"><span>Print</span></a>
                        </div></div>
                        <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control input-sm">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select> entries</label></div><div id="DataTables_Table_0_filter" class="dataTables_filter">
                                <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="DataTables_Table_0"></label>
                                </div><div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 5 of 5 entries</div>
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                    <thead>
                    <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Division: activate to sort column ascending" style="width: 289px;">Division</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Staff Member Name: activate to sort column ascending" style="width: 356px;">Faculty Name</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Staff Member Name: activate to sort column ascending" style="width: 356px;">Group or Individual</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 322px;">Course Prefix</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">Course Number</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 322px;">Quarter</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">Year</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">Status</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">Date</th>
                    <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 250px;">View TIP</th>
                    </tr>
                    </thead>
                    <tbody>
                    
                    
                    <tr class="odd" role="row">
                        <td class="">M&S</td>
                        <td class="">John Doe</td>
                        <td class="">individual</td>
                        <td class="">AD</td>
                        <td class="">IT125</td>
                        <td class="">Spring</td>
                        <td class="">2017</td>
                        <td class="">completed</td>
                        <td class="">05-05-17</td>
                        <td class=""></td>
                    </tr>
                    <tr class="even" role="row">
                        <td class="">M&S</td>
                        <td class="">Mary Moe</td>
                        <td class="">group</td>
                        <td class="">AD</td>
                        <td class="">340</td>
                        <td class="">Spring</td>
                        <td class="">2017</td>
                        <td class="">in-progress</td>
                        <td class="">04-02-17</td>
                        <td class=""></td>
                    </tr>
                    <tr class="odd" role="row">
                        <td class="">M&S</td>
                        <td class="">Sally Smith</td>
                        <td class="">individual</td>
                        <td class="">AD</td>
                        <td class="">410</td>
                        <td class="">Winter</td>
                        <td class="">2017</td>
                        <td class="">completed</td>
                        <td class="">03-15-17</td>
                        <td class=""></td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                    <th rowspan="1" colspan="1">Division</th>
                    <th rowspan="1" colspan="1">Faculty Name</th>
                    <th rowspan="1" colspan="1">Group or Individual</th>
                    <th rowspan="1" colspan="1">Course Prefix</th>
                    <th rowspan="1" colspan="1">Course Number</th>
                    <th rowspan="1" colspan="1">Quarter</th>
                    <th rowspan="1" colspan="1">Year</th>
                    <th rowspan="1" colspan="1">Status</th>
                    <th rowspan="1" colspan="1">Date</th>
                    <th rowspan="1" colspan="1">View TIP</th>
                    </tr>
                    </tfoot>
                    </table>
                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                            <li class="paginate_button previous disabled" id="DataTables_Table_0_previous"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
                            <li class="paginate_button active"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0">2</a></li>
                            <li class="paginate_button "><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0">3</a></li>
                            <li class="paginate_button next" id="DataTables_Table_0_next"><a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0">Next</a></li>
                            </ul>
                    </div>
                    </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
                                        
                        


<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   
<script type="text/javascript" src="js/charts-demo-data.js"></script>
  

@endsection
