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
                                <canvas id="doughnutChart1" height="200" width="200" style="display: block; width: 200px; height: 200px;"></canvas>
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
                                <canvas id="barChart2" height="200" width="200" style="display: block; width: 200px; height: 200px;"></canvas>
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
                                <canvas id="doughnutChart2" height="200" width="200" style="display: block; width: 200px; height: 200px;"></canvas>
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
                                <canvas id="barChart3" height="200" width="200" style="display: block; width: 200px; height: 200px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   
<script>
    /*global Chart*/    
    var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [

            {
                label: "TIPS submitted",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27, 90]
            },{
                label: "TIPS in progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55, 40]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
    
        var barData1 = {
        labels: ["AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S"],
        datasets: [
            {
                label: "TIPS submitted",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [65, 59, 80, 81, 56, 55]
            },
            {
                label: "TIPS in progress",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart1").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData1, options:barOptions});
    
     var doughnutData1 = {
        labels: ["Feedback","Behavoir","Performance" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;
    
    var doughnutData2 = {
        labels: ["Feedback","Behavoir","Performance" ],
        datasets: [{
            data: [100,150,300],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;


    var doughnutOptions = {
        responsive: true
    };


    var ctx4 = document.getElementById("doughnutChart1").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData1, options:doughnutOptions});
    
    var ctx6 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx6, {type: 'doughnut', data: doughnutData2, options:doughnutOptions});
    
    var barData2 = {
    labels: ["1", "2", "3", "4", "5", "6", "7"],
    datasets: [
        {
            backgroundColor: 'rgba(26,179,148,0.5)',
            borderColor: "rgba(26,179,148,0.7)",
            pointBackgroundColor: "rgba(26,179,148,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27, 50]
        }
    ]
    };
    
    var barData3 = {
    labels: ["1", "2", "3", "4", "5", "6"],
    datasets: [
        {
            backgroundColor: 'rgba(26,179,148,0.5)',
            borderColor: "rgba(26,179,148,0.7)",
            pointBackgroundColor: "rgba(26,179,148,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27]
        }
    ]
    };

    var barOptions2 = {
        legend: { display: false,
            responsive: true, 
        }
    };
         

    var ctx5 = document.getElementById("barChart2").getContext("2d");
    new Chart(ctx5, {type: 'bar', data: barData2, options:barOptions2});
    
    var ctx7 = document.getElementById("barChart3").getContext("2d");
    new Chart(ctx7, {type: 'bar', data: barData3, options:barOptions2});

</script>

@endsection
