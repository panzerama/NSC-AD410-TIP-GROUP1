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

 
<table id="data-table" class="display" width="100%"></table>



<!-- DataTables-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-colvis-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.js"></script>

<script>
$(function() {
	$('#data-table').DataTable({
		processing: true,
		serverSide: true,
		ajax: '{!! url('/table-data') !!}'
	});
});
</script>


@endsection
