

<div class="ibox float-e-margins">
            <div class="ibox-title">
             <h5 class = "no-margins">How impact assessed</h5>
             <a id="download6" download="how_impact_assessed.jpg"><button type="button" class="label label-primary pull-right" onClick="download6()">jpg</button></a>
             </div>
              <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="doughnutChart2" height="100" style="display: block; height: 100px;"></canvas>
            </div>
</div>


                    
<?php
    $answer = array_keys($data['how_impact_assessed']);
    $countByImpactAssessed = array_column($data['how_impact_assessed'],'countByImpactAssessed');
?>         



<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>  
<script>
//----------------------------------------------------------------     
/* How impact assessed */
//----------------------------------------------------------------  
var answers = JSON.parse('<?php echo json_encode($answer); ?>');

var answers_trunc = answers.map(function(e) { 
  e = e.substr(0, 20)+"...";//truncate+ellipses
  return e;
});

    var doughnutData2 = {
        labels: answers_trunc,
        datasets: [{
            data: JSON.parse('<?php echo json_encode($countByImpactAssessed); ?>'),
            backgroundColor: ["#254284","#008EE2","#91349B"]
        }]
    } ;
    var doughnutOptions2 = {
        responsive: true,
            legend: { display: true,
            position: 'right',
            labels: {
                padding: 5,
                boxWidth: 10,
            }
        }
    };
    var ctx6 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx6, {type: 'doughnut', data: doughnutData2, options:doughnutOptions2});
    
    function download6(){
        var download = document.getElementById("download6");
        var image = document.getElementById("doughnutChart2").toDataURL("image/jpg", 1.0)
                    .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }

  

</script>
