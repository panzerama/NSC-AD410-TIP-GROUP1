
<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>TIPS by division</h5>
        <a id="download2" download="tips_by_division.jpg"><button type="button" class="label label-primary pull-right" onClick="download2()">jpg</button></a>
    </div>
    <div class="ibox-content">
        <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 10px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
            <canvas id="barChart1" height="100" style="display: block; height: 100px;"></canvas>
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
var theData = JSON.parse('<?php echo json_encode($countByDivisionSubmitted); ?>');
theData.sort();
theData.reverse();
    
    var barData1 = {
        labels: JSON.parse('<?php echo json_encode($division); ?>'),
        datasets: [
            {
                label: "Submitted",
                backgroundColor: 'rgba(0,142,226,1)',
                borderColor: 'rgba(0,142,226,1)',
                pointBackgroundColor: "rgba(0,142,226,1)",
                pointBorderColor: "#fff",
                data: theData
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
    
    function download2(){
        var download = document.getElementById("download2");
        var image = document.getElementById("barChart1").toDataURL("image/jpg", 1.0)
                    .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
    
  
    
</script>