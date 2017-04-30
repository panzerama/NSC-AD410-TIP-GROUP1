<?php $__env->startSection('title', 'TIPS Admin'); ?>

<?php $__env->startSection('content'); ?>
    

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
                    <div class="ibox-content">
                        <div>
                                        <span class="pull-right text-right">
                                            All TIPS: 1,025
                                        </span>
                            <h3 class="font-bold no-margins">
                                TIPS by month
                            </h3>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-8">
                                    <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                        <canvas id="lineChart" height="164" width="434" style="display: block; width: 434px; height: 164px;"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <ul class="stat-list m-t-lg">
                                        <li>
                                            <h2 class="no-margins">125</h2>
                                            <small>Total TIPS in period</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 48%;"></div>
                                            </div>
                                        </li>
                                        <li>
                                            <h2 class="no-margins ">20</h2>
                                            <small>TIPS in last month</small>
                                            <div class="progress progress-mini">
                                                <div class="progress-bar" style="width: 60%;"></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-reports-app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>