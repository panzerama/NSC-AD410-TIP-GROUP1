


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

<script>
//----------------------------------------------------------------     
/* Primary ELO added by TIP */
//----------------------------------------------------------------            
    var barData4 = {
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
    datasets: [
        {
            backgroundColor: 'rgba(0,142,226,1)',
            borderColor: "rgba(0,142,226,1)",
            pointBackgroundColor: "rgba(0,142,226,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27, 15, 65, 21, 47, 32, 8]
        }
    ]
    };
    var barOptions4 = {
        responsive: true,
            legend: { display: false,
            position: 'right'
            }
    };
    var ctx8 = document.getElementById("barChart4").getContext("2d");
    new Chart(ctx8, {type: 'bar', data: barData4, options:barOptions4});
//----------------------------------------------------------------      
</script>


