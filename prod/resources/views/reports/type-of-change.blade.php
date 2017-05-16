


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
    var doughnutData2 = {
        labels: ["Feedback","Behavoir","Performance" ],
        datasets: [{
            data: [100,150,300],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;
    var doughnutOptions2 = {
        responsive: true,
            legend: { display: false,
            position: 'right'
        }
    };
    var ctx6 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx6, {type: 'doughnut', data: doughnutData2, options:doughnutOptions2});
</script>


