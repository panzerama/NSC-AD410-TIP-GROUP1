

<div class="ibox float-e-margins">
            <div class="ibox-title">
                 <h5 class = "no-margins">New opportunities</h5>
                 <a id="download7" download="new_opportunities.jpg"><button type="button" class="label label-primary pull-right" onClick="download7()">jpg</button></a>
                 </div>
                  <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="barChart3" height="100" style="display: block; height: 100px;"></canvas>
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
             backgroundColor: 'rgba(0,142,226,1)',
                borderColor: 'rgba(0,142,226,1)',
                pointBackgroundColor: "rgba(0,142,226,1)",
            data: theData,
        }
    ]
    };
    var barOptions3 =  {
        responsive: true,
            legend: { display: false,
            position: 'right',
            labels: {
                boxWidth: 10,
            }
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
    
    function download7(){
        var download = document.getElementById("download7");
        var image = document.getElementById("barChart3").toDataURL("image/jpg", 1.0)
                    .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>