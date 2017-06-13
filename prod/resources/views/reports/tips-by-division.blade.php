
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>TIPS by division</h5>
    </div>
    <div class="ibox-content">
        <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 10px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
            <canvas id="barChart1" height="120" style="display: block; height: 120px;"></canvas>
        </div>
    </div>
</div>

<?php
    
    $division = array_keys($data['tips_by_division']);
    $countByDivisionSubmitted = array_column($data['tips_by_division'], 'tips_by_division_finished');
    $countByDivisionInprogress = array_column($data['tips_by_division'], 'tips_by_division_in_progress');
?>         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------     
/* Faculty participation by division */
//---------------------------------------------------------------- 
    
    var barData1 = {
        labels: JSON.parse('<?php echo json_encode($division); ?>'),
        datasets: [
            {
                label: "Submitted",
                backgroundColor: 'rgba(0,142,226,1)',
                borderColor: 'rgba(0,142,226,1)',
                pointBackgroundColor: "rgba(0,142,226,1)",
                pointBorderColor: "#fff",
                data: JSON.parse('<?php echo json_encode($countByDivisionSubmitted); ?>')
            },
            {
                label: "In-progress",
                backgroundColor: 'rgba(220, 220, 220, 1)',
                borderColor: 'rgba(220, 220, 220, 1)',
                backgroundColor: 'rgba(220, 220, 220, 1)',
                pointBorderColor: "#fff",
                data: JSON.parse('<?php echo json_encode($countByDivisionInprogress); ?>')
            }
        ]
    };
    var barOptions = {
        responsive: true,
            legend: { display: true,
            position: 'top'
        }
    };
    var ctx2 = document.getElementById("barChart1").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData1, options:barOptions});
</script>