
               <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>TIPS by month
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                            <canvas id="lineChart" height="50" style="display: block; height: 50px;"></canvas>
                        </div>
                    </div>
                </div>
<?php
    $month = array_values($data['tips_by_month']['month']);
    $countByMthSubmitted = array_values($data['tips_by_month']['tips_by_month_finished']);
    $countByMthInprogress = array_values($data['tips_by_month']['tips_by_month_in_progress']);

?>
<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------       
/* TIPS by month */
//---------------------------------------------------------------- 

    var lineData = {
        labels: JSON.parse('<?php echo json_encode($month); ?>'),
        datasets: [

            {
                label: "Submitted",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                fill: true,
                data: JSON.parse('<?php echo json_encode($countByMthSubmitted); ?>')
            },{
                label: "In-progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                fill: true,
                data: JSON.parse('<?php echo json_encode($countByMthInprogress); ?>')
            }
        ]
    };
    var lineOptions = {
        responsive: true,
            legend: { display: true,
            position: 'right'
            }
    };
    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
</script>
