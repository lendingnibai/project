
$(function () {

// // Get the context of the canvas element we want to select
// var ctx = document.getElementById("sales").getContext('2d');
// var myLineChart = new Chart(ctx).Line(data, option); //'Line' defines type of the chart.

// // Get the context of the canvas element we want to select
// var ctx = document.getElementById("conversion").getContext('2d');
// var myRadarChart = new Chart(ctx).Radar(data, option);

// Get the context of the canvas element we want to select

//bar
var ctxB = document.getElementById("investment").getContext('2d');
var ako = 666;
var myBarChart = new Chart(ctxB, {
    type: 'bar',
    data: {
        labels: ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [{
            label: '# of Investors',
            data: [12, 19, 3, 5, 2, 3, 2, 4, 10, 22, 100, 11],
            backgroundColor: [
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)',
                'rgba(255, 255, 255, 0.3)'
            ],
            borderColor: [
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)',
                'rgba(255, 255, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: {
            labels: {
                fontColor: "white"
            }
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    fontColor: "white"
                }
            }],
            xAxes: [{
                ticks: {
                    fontColor: "white"
                }
            }]
        }
    }
});

});


//Global settings
Chart.defaults.global.defaultFontColor = '#fff';
$(function () {

//line
var ctxL = document.getElementById("sales").getContext('2d');
var myLineChart = new Chart(ctxL, {
    type: 'line',
    data: {
        labels: ["January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        datasets: [
            {
                label: "Monthly # of Investment",
                fillColor: "rgba(220,220,220,0.2)",
                strokeColor: "rgba(220,220,220,1)",
                pointColor: "rgba(220,220,220,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                backgroundColor: [
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)'
                ],
                borderWidth: 1,
                data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56]
            },
            {
              label: "[ Total # of Investment = "+(65+59+80+81+56+55+40+65+59+80+81+56)  +" ]"

            },
            {
                label: "Monthly Eernings",
                fillColor: "rgba(151,187,205,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(151,187,205,1)",
                backgroundColor: [
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)',
                    'rgba(255, 255, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)',
                    'rgba(255, 255, 255, 1)'
                ],
                borderWidth: 1,
                data: [28, 48, 40, 19, 86, 27, 90, 40, 19, 86, 27, 90]
            },
            {
              label: "[ Total Earnings = ₱"+(28+48+40+19+86+27+90+40+19+86+27+90)  +" ]"

            }
        ]
    },
    options: {
        responsive: true
    }
});

});
