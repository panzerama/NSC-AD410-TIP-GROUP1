
               <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>TIPS by month
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                            <canvas id="lineChart" height="50" style="display: block; height: 50px;"></canvas>
                        </div>
                    </div>
                </div>
         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script>
//----------------------------------------------------------------       
/* TIPS by month */
//----------------------------------------------------------------   
    var lineData = {
        labels: ["July", "August", "September", "October", "November", "January", "February"],
        datasets: [

            {
                label: "Submitted",
                backgroundColor: 'rgba(0,142,226,0.7)',
                borderColor: "rgba(0,142,226,1)",
                pointBackgroundColor: "rgba(0,142,226,1)",
                pointBorderColor: "#fff",
                fill: true,
                data: [24, 14, 29, 10, 13, 30, 6]
            },{
                label: "In-progress",
                backgroundColor: 'rgba(220, 220, 220, 0.7)',
                pointBorderColor: "#fff",
                fill: true,
                data: [5, 10, 15, 17, 20, 4, 2]
            }
        ]
    };
    var lineOptions = {
        responsive: true,
            legend: { display: true,
            position: 'right'
            }
    };
    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
</script>

  


