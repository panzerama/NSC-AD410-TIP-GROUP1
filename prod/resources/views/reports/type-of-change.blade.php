

<div class="ibox float-e-margins">
            <div class="ibox-title">
                 <h5 class = "no-margins">Type of change</h5>
                 <a id="download5" download="type_of_change.jpg"><button type="button" class="label label-primary pull-right" onClick="download5()">jpg</button></a>
                 </div>
                  <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="barChart2" height="100" style="display: block; height: 100px;"></canvas>
            </div>
</div>

<?php
    $answer = array_keys($data['type_of_change']);
    $countByTypeChange = array_column($data['type_of_change'],'countByTypeChange');
?>   

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------     
/*   Type of change */
//----------------------------------------------------------------   
var answers = JSON.parse('<?php echo json_encode($answer); ?>');

var answers_trunc = answers.map(function(e) { 
  e = e.substr(0, 40)+"...";//truncate+ellipses
  return e;
});

var theData = JSON.parse('<?php echo json_encode($countByTypeChange); ?>');
theData.sort();
theData.reverse();

    var barData2 = {
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
    var barOptions2 =  {
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
    ]
    };

    var ctx5 = document.getElementById("barChart2").getContext("2d");
    new Chart(ctx5, {type: 'bar', data: barData2, options:barOptions2});
    
    function download5(){
        var download = document.getElementById("download5");
        var image = document.getElementById("barChart2").toDataURL("image/jpg", 1.0)
                    .replace("image/jpg", "image/octet-stream");
        download.setAttribute("href", image);
    }
</script>
