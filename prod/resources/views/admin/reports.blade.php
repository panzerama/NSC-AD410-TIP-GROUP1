@extends('layouts.admin-reports-app')

@section('title', 'TIPS Admin')

@section('content')
    

    <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-t-lg">
                            <h1>
                                TIPS Dashboard
                            </h1>
                        
                        </div>
                    </div>
                </div>
            </div>
    
<div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>TIPS by month
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="lineChart" height="164" width="434" style="display: block; width: 434px; height: 164px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Faculty participation by division</h5>
                        </div>
                        <div class="ibox-content">
                            <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="barChart1" height="164" width="434" style="display: block; width: 434px; height: 164px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Evidence for change needed</h5>

                        </div>
                        <div class="ibox-content">
                            <div class="text-center"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="doughnutChart1" height="100" width="125" style="display: block; width: 125px; height: 100px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Type of change</h5>
                        </div>
                        <div class="ibox-content">
                            <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="barChart2" height="100" width="125" style="display: block; width: 125px; height: 100px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>How impact assessed</h5>

                        </div>
                        <div class="ibox-content">
                            <div class="text-center"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="doughnutChart2" height="100" width="125" style="display: block; width: 125px; height: 100px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>New opportunities</h5>
                        </div>
                        <div class="ibox-content">
                            <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="barChart3" height="100" width="125" style="display: block; width: 125px; height: 100px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Primary ELO added by TIP</h5>
                        </div>
                        <div class="ibox-content">
                            <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="barChart4" height="164" width="434" style="display: block; width: 434px; height: 164px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   
<script type="text/javascript" src="js/charts-demo-data.js"></script>
  

@endsection
