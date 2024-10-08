// loading API
google.charts.load('current', { packages: ['corechart'] });
google.charts.setOnLoadCallback(fetchMonthlyVisits);

// function to fetch data from read.php
function fetchMonthlyVisits() {
    fetch('../monthly_visits/read.php')
        .then(response => response.json())
        .then(data => {
            console.log('Fetched data:', data); // Debugging: Log fetched data

            let visitTable = document.getElementById('visitTableBody');
            visitTable.innerHTML = ''; // Clear existing rows

            let chartData = [['Month', 'Number of Visitors']];

            data.forEach(visit => {
                let row = document.createElement('tr');

                let yearCell = document.createElement('td');
                yearCell.textContent = visit.visit_year;
                row.appendChild(yearCell);

                let monthCell = document.createElement('td');
                monthCell.textContent = visit.visit_month;
                row.appendChild(monthCell);

                let visitorsCell = document.createElement('td');
                visitorsCell.textContent = visit.num_of_visitors;
                row.appendChild(visitorsCell);

                visitTable.appendChild(row);
                
                chartData.push([`${visit.visit_month}-${visit.visit_year}`, parseInt(visit.num_of_visitors)]);
            });

            console.log('Chart data:', chartData); // Debugging: Log chart data

            renderChart(chartData);
        })
        .catch(error => console.error('Error fetching visit data:', error));
}

// function to render the graph
function renderChart(chartDataArray) {
    var data = google.visualization.arrayToDataTable(chartDataArray);

    var options = {
        title: 'Monthly Visits Statistics',
        hAxis: { title: 'Month' },
        vAxis: { title: 'Number of Visitors', minValue: 0 },
        chartArea: { width: '70%', height: '70%' },
        legend: { position: 'none' },
        animation: {
            startup: true,
            duration: 1000,
            easing: 'out',
        },
    };

    var chart = new google.visualization.ColumnChart(document.getElementById('chartContainer'));
    chart.draw(data, options);
}


// calling function to fetch and display data
document.addEventListener('DOMContentLoaded', fetchMonthlyVisits);
