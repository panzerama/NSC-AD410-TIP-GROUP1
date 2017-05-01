

    /*global Chart*/    
    var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July"],
        datasets: [

            {
                label: "TIPS submitted",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                fill: false,
                data: [28, 48, 40, 19, 86, 27, 90]
            },{
                label: "TIPS in progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                fill: false,
                data: [5, 10, 15, 7, 20, 4, 12]
            }
        ]
    };

    var lineOptions = {
        responsive: true
    };


    var ctx = document.getElementById("lineChart").getContext("2d");
    new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
    
        var barData1 = {
        labels: ["AHSS", "BEIT", "BTS", "HHS", "LIB", "M&S"],
        datasets: [
            {
                label: "TIPS submitted",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [28, 48, 40, 19, 86, 27]
            },
            {
                label: "TIPS in progress",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [5, 10, 15, 7, 20, 4]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart1").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData1, options:barOptions});
    
     var doughnutData1 = {
        labels: ["Feedback","Behavoir","Performance" ],
        datasets: [{
            data: [300,50,100],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;
    
    var doughnutData2 = {
        labels: ["Feedback","Behavoir","Performance" ],
        datasets: [{
            data: [100,150,300],
            backgroundColor: ["#a3e1d4","#dedede","#b5b8cf"]
        }]
    } ;


    var doughnutOptions = {
        responsive: true
    };


    var ctx4 = document.getElementById("doughnutChart1").getContext("2d");
    new Chart(ctx4, {type: 'doughnut', data: doughnutData1, options:doughnutOptions});
    
    var ctx6 = document.getElementById("doughnutChart2").getContext("2d");
    new Chart(ctx6, {type: 'doughnut', data: doughnutData2, options:doughnutOptions});
    
    var barData2 = {
    labels: ["1", "2", "3", "4", "5", "6", "7"],
    datasets: [
        {
            backgroundColor: 'rgba(26,179,148,0.5)',
            borderColor: "rgba(26,179,148,0.7)",
            pointBackgroundColor: "rgba(26,179,148,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27, 50]
        }
    ]
    };
    
    var barData3 = {
    labels: ["1", "2", "3", "4", "5", "6"],
    datasets: [
        {
            backgroundColor: 'rgba(26,179,148,0.5)',
            borderColor: "rgba(26,179,148,0.7)",
            pointBackgroundColor: "rgba(26,179,148,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27]
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
    
    var ctx7 = document.getElementById("barChart3").getContext("2d");
    new Chart(ctx7, {type: 'bar', data: barData3, options:barOptions2});
    
    var barData4 = {
    labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
    datasets: [
        {
            backgroundColor: 'rgba(26,179,148,0.5)',
            borderColor: "rgba(26,179,148,0.7)",
            pointBackgroundColor: "rgba(26,179,148,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27, 15, 65, 21, 47, 32, 8]
        }
    ]
    };
    
    var ctx8 = document.getElementById("barChart4").getContext("2d");
    new Chart(ctx8, {type: 'bar', data: barData4, options:barOptions2});
    