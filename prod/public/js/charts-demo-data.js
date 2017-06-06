/*global Chart*/   

//----------------------------------------------------------------       
/* TIPS by month */
//----------------------------------------------------------------   
    var lineData = {
        labels: ["July", "August", "September", "October", "November", "January", "February"],
        datasets: [

            {
                label: "Submitted",
                backgroundColor: 'rgba(0,142,226,0.5)',
                borderColor: "rgba(0,142,226,0.7)",
                pointBackgroundColor: "rgba(0,142,226,1)",
                pointBorderColor: "#fff",
                fill: true,
                data: [24, 14, 29, 10, 13, 30, 6]
            },{
                label: "In-progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
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
//----------------------------------------------------------------     
/* Faculty participation by division */
//----------------------------------------------------------------    
    var barData1 = {
        labels: ["AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S"],
        datasets: [
            {
                label: "Submitted",
                backgroundColor: 'rgba(0,142,226,0.5)',
                borderColor: "rgba(0,142,226,0.7)",
                pointBackgroundColor: "rgba(0,142,226,1)",
                pointBorderColor: "#fff",
                data: [65, 48, 29, 19, 13, 6]
            },
            {
                label: "In-progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                borderColor: 'rgba(220, 220, 220, 0.7)',
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [5, 10, 15, 7, 20, 4]
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
//----------------------------------------------------------------     
/* How impact assessed */
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
//----------------------------------------------------------------     
/* New opportunities */
//----------------------------------------------------------------     
    var barData3 = {
    labels: ["1", "2", "3", "4", "5", "6"],
    datasets: [
        {
            backgroundColor: 'rgba(0,142,226,0.5)',
            borderColor: "rgba(0,142,226,0.7)",
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
//----------------------------------------------------------------     
/* Primary ELO added by TIP */
//----------------------------------------------------------------            
    var barData4 = {
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
    datasets: [
        {
            backgroundColor: 'rgba(0,142,226,0.5)',
            borderColor: "rgba(0,142,226,0.7)",
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
    