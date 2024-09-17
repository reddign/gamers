<?php
session_start()
?>

<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width =device-width, initial-scale=1.0">
    <title>Monthly User Visits</title>
    <link rel="stylesheet" href = "style.css">
</head>
<body>
    <h1> Monthly Visits Statistics</h1>
    <table border = "1">
        <tr>
            <th>Month</th>
            <th>Number of Visitors</th>
        </tr>
<?php
// TODO: Connect to the database
// example connection: $conn = new mysqli("localhost", "username", "password", "database");

// Check the connection using the following...
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


//TODO: Write a SQL query to grab the data for number of users per month
// LIKE $sql = "SELECT MONTH(visit_date) AS month, COUNT(user_id) AS num_visits FROM visits GROUP BY MONTH(visit_date)";
// $result = $conn->query($sql);


// TODO: Write a loop to go through the results and display them in the table
// if any results were returnes, we loop through each row in result set
// then we print each row in the new row in the table
// else, if no reults were found we can display an error



// TODO: Close database connection
// $conn->close();
?>
    </table>
</body>
</html