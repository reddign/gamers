// fetch and display monthly visits
function fetchMonthlyVisits() {
    fetch('read.php')
        .then(response => response.json())  // change to JSON
        .then(data => {
            let visitTable = document.getElementById('visitTableBody');  // Table body for inserting rows

            // loop through the data and create table rows
            data.forEach(visit => {
                let row = document.createElement('tr');

                // make cells for each piece of data
                let yearCell = document.createElement('td');
                yearCell.textContent = visit.visit_year;
                row.appendChild(yearCell);

                let monthCell = document.createElement('td');
                monthCell.textContent = visit.visit_month;
                row.appendChild(monthCell);

                let visitorsCell = document.createElement('td');
                visitorsCell.textContent = visit.num_of_visitors;
                row.appendChild(visitorsCell);

                // add the row to the table body
                visitTable.appendChild(row);
            });
        })
        .catch(error => console.error('Error fetching visit data:', error));
}

// calling function to fetch and display data
document.addEventListener('DOMContentLoaded', fetchMonthlyVisits);
