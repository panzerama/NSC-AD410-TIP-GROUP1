


        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Primary ELO added by TIP</h5>
            </div>
            <div class="ibox-content">
                <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                    <canvas id="barChart4" height="110" style="display: block; height: 110px;"></canvas>
                </div>
            </div>
        </div>

                    
         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<?php
    $answer = array_keys($data['primary_ELO']);
    $countByELO = array_column($data['primary_ELO'],'countByELO');
?>                      

<script>
//----------------------------------------------------------------     
/* Primary ELO added by TIP */
//---------------------------------------------------------------- 
var answers = JSON.parse('<?php echo json_encode($answer); ?>');

var answers_trunc = answers.map(function(e) { 
  e = e.substr(0, 40)+"...";//truncate+ellipses
  return e;
});

var theData = JSON.parse('<?php echo json_encode($countByELO); ?>');
theData.sort();
theData.reverse();
 
    var barData4 = {
        labels: answers,
         datasets: [{
           data: theData,
            backgroundColor: "#008ee2",
             }]
    };
    var barOptions4 =  {
        legend: { display: false,
            responsive: true, 
        },
         tooltips: {
            mode: 'index',
            intersect: true,
            callbacks: {
              title: function(tooltipItem, data) {
                return data["labels"][tooltipItem[0]["index"]];
              }
            }
          },
        scales: {
            xAxes: [{
                ticks: {
            userCallback: function(value, index, values) {
              return value.replace(value,index+1);
            }
          }
            }],
            yAxes: [{
                ticks: { beginAtZero: true }
            }]
        }
    };

    var ctx8 = document.getElementById("barChart4").getContext("2d");
    new Chart(ctx8, {type: 'bar', data: barData4, options: barOptions4});
//----------------------------------------------------------------      
</script>


