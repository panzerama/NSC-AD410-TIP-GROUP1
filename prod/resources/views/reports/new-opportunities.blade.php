


        <div class="col-lg-6">
            <div class="ibox-title">
                 <h5 class = "no-margins">New opportunities</h5>
                 </div>
                  <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="barChart3" width="500" height="150" style="margin: 0px auto 0px; display: block; width: 50px; height: 10px;"></canvas>
            </div>
        </div>


<?php
    $answer = array_keys($data['new_opportunities']);
    $countByNewOpp = array_column($data['new_opportunities'],'countByNewOpp');
?>                      

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------     
/* New opportunities */
//----------------------------------------------------------------   
var answers = JSON.parse('<?php echo json_encode($answer); ?>');

var answers_trunc = answers.map(function(e) { 
  e = e.substr(0, 40)+"...";//truncate+ellipses
  return e;
});

var theData = JSON.parse('<?php echo json_encode($countByNewOpp); ?>');
theData.sort();
theData.reverse();

    var barData3 = {
    labels: answers_trunc,
    datasets: [
        {
             backgroundColor: "#008ee2",
            data: theData,
        }
    ]
    };
    var barOptions3 =  {
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
    
    var ctx7 = document.getElementById("barChart3").getContext("2d");
    new Chart(ctx7, {type: 'bar', data: barData3, options:barOptions3});
</script>