$(document).ready(function(){

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
            callbacks: {
                label: function (tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var totalValue = dataset.data.reduce((a, b) => a + b, 0);
                    var currentValue = dataset.data[tooltipItem.index];
                    var percentage = ((currentValue / totalValue) * 100).toFixed(2);
                    return data.labels[tooltipItem.index] + ': ' + currentValue + ' (' + percentage + '%)';
                }
            }
        }
        }
    });

});