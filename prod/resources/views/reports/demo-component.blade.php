@extends('reports.demo')

@section('tips-by-month')

<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>TIPS by month
        </h5>
    </div>
    <!-- use $data somewhere in here -->
    <div class="ibox-content">
        <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
            <canvas id="lineChart" height="164" width="434" style="display: block; width: 434px; height: 164px;"></canvas>
        </div>
    </div>
</div>

@endsection