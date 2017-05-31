@extends('layouts.admin-reports-app')

@section('title', 'TIPS Admin')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
<h2>Reports Dashboard</h2>
    <ol class="breadcrumb">
        <li>
            <a href="reports">Reports</a>
        </li>
        <li class="active">
            <strong>Q/A Reports</strong>
        </li>
        <li>
            <a href="table">Data Table</a>
        </li>
    </ol>
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

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   
<!--<script type="text/javascript" src="js/charts-demo-data.js"></script>-->

@endsection
