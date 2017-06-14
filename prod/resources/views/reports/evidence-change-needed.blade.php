


        <div class="col-lg-6">
            <div class="ibox-title">
             <h5 class = "no-margins">Evidence for change needed</h5>
             </div>
              <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="doughnutChart1"  width="500" height="150" style="margin: 0px auto 0px; display: block; width: 50px; height: 10px;"></canvas>
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
  e = e.substr(0, 30)+"...";//truncate+ellipses
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
            legend: { display: false,
            position: 'right'
        }
    };
    var ctx4 = document.getElementById("doughnutChart1").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData1, options:doughnutOptions});
  
</script>


