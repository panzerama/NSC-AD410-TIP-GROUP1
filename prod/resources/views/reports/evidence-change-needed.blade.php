


            <div class="col-lg-6">
                <div class="ibox-title">
                 <h5 class = "no-margins">Evidence for change needed</h5>
                 </div>
                  <div class="ibox-content">
                <iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                <canvas id="doughnutChart1"  width="50" height="10" style="margin: 0px auto 0px; display: block; width: 50px; height: 10px;"></canvas>
            </div>
            </div>


                    
         

<!-- ChartJS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>   
<!-- 
<script type="text/javascript" src="js/charts-demo-data.js"></script>
-->
<script>
//----------------------------------------------------------------     
/* Evidence for change needed */
//----------------------------------------------------------------        
    var doughnutData1 = {
        labels: ["Feedback","Behavoir","Performance" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;
    var doughnutOptions = {
        responsive: true,
            legend: { display: false,
            position: 'bottom'
        }
    };
    var ctx4 = document.getElementById("doughnutChart1").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData1, options:doughnutOptions});
</script>


