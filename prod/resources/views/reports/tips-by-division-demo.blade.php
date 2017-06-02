
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>TIPS by division</h5>
                    </div>
                    <div class="ibox-content">
                        <div><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                            <canvas id="barChart1" height="120" style="display: block; height: 120px;"></canvas>
                        </div>
                    </div>
                </div>
         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   

<script type="text/javascript" src="js/charts-demo-data.js"></script>

<script>
//----------------------------------------------------------------     
/* Faculty participation by division */
//---------------------------------------------------------------- 

    var barData1 = {
        labels: division,
        datasets: [
            {
                label: "Submitted",
                backgroundColor: 'rgba(0,142,226,0.5)',
                borderColor: "rgba(0,142,226,0.7)",
                pointBackgroundColor: "rgba(0,142,226,1)",
                pointBorderColor: "#fff",
                data: countByDivisionSubmitted
            },
            {
                label: "In-progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                borderColor: 'rgba(220, 220, 220, 0.7)',
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: countByDivisionInprogress
            }
        ]
    };
    var barOptions = {
        responsive: true,
            legend: { display: true,
            position: 'right'
        }
    };
    var ctx2 = document.getElementById("barChart1").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData1, options:barOptions});
</script>
  


