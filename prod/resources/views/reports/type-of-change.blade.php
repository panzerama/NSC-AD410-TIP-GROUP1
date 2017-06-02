


        <div class="col-lg-6">
            <div class="ibox-title">
                 <h5 class = "no-margins">Type of change</h5>
                 </div>
                  <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="barChart2"  width="50" height="15" style="margin: 0px auto 0px; display: block; width: 10px; height: 10px;"></canvas>
            </div>
        </div>


                    
         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   
<!-- 
<script type="text/javascript" src="js/charts-demo-data.js"></script>
-->
<script>
//----------------------------------------------------------------     
/* Type of change */
//----------------------------------------------------------------     
    var barData2 = {
    labels: ["1", "2", "3", "4", "5", "6", "7"],
    datasets: [
        {
            backgroundColor: 'rgba(0,142,226,0.5)',
            borderColor: "rgba(0,142,226,0.7)",
            pointBackgroundColor: "rgba(0,142,226,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27, 50]
        }
    ]
    };
    var barOptions2 = {
        legend: { display: false,
            responsive: true, 
        }
    };
    var ctx5 = document.getElementById("barChart2").getContext("2d");
    new Chart(ctx5, {type: 'bar', data: barData2, options:barOptions2});
</script>


