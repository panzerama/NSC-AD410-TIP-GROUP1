

<div class="ibox float-e-margins">
            <div class="ibox-title">
             <h5 class = "no-margins">Evidence for change needed</h5>
             <a id="download4" download="evidence_change_needed.jpg"><button type="button" class="label label-primary pull-right" onClick="download4()">jpg</button></a>
             </div>
              <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                 <canvas id="doughnutChart1" height="100" style="display: block; height: 100px;"></canvas>
            </div>
</div>
       
<?php
   $answer = array_keys($data['evidence_change_needed']);
   $countByChangeNeeded = array_column($data['evidence_change_needed'],'countByChangeNeeded');
?>         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------     
/* Evidence for change needed */
//----------------------------------------------------------------    


var answers = JSON.parse('<?php echo json_encode($answer); ?>');

var answers_trunc = answers.map(function(e) { 
  e = e.substr(0, 20)+"...";//truncate+ellipses
  return e;
});

    var doughnutData1 = {
        labels: answers_trunc,
        datasets: [{
            data: JSON.parse('<?php echo json_encode($countByChangeNeeded); ?>'),
            backgroundColor: ["#254284","#008EE2","#91349B"]
        }]
    } ;
    var doughnutOptions = {
        responsive: true,
            legend: { display: true,
            position: 'right',
            labels: {
                padding: 5,
                boxWidth: 10,
            }
        }
    };
    var ctx4 = document.getElementById("doughnutChart1").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData1, options:doughnutOptions});
    
    function download4(){
        var download = document.getElementById("download4");
        var image = document.getElementById("doughnutChart1").toDataURL("image/jpg", 1.0)
                    .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }  
</script>


