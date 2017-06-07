


        <div class="col-lg-6">
            <div class="ibox-title">
                 <h5 class = "no-margins">New opportunities</h5>
                 </div>
                  <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="barChart3" width="50" height="15" style="margin: 0px auto 0px; display: block; width: 50px; height: 10px;"></canvas>
            </div>
        </div>

                    
         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------     
/* New opportunities */
//----------------------------------------------------------------     
    var barData3 = {
    labels: ["1", "2", "3", "4", "5", "6"],
    datasets: [
        {
            backgroundColor: 'rgba(0,142,226,1)',
            borderColor: "rgba(0,142,226,1)",
            pointBackgroundColor: "rgba(0,142,226,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27]
        }
    ]
    };
    var barOptions3 = {
        legend: { display: false,
            responsive: true, 
        }
    };
    var ctx7 = document.getElementById("barChart3").getContext("2d");
    new Chart(ctx7, {type: 'bar', data: barData3, options:barOptions3});
</script>