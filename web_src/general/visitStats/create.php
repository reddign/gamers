<?php
// connect to the database
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);


// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// SQL query
$sql = "SELECT visitor, COUNT(*) AS visit_count FROM visit GROUP BY visitor";

$result = $connection->query($sql);






// Close the connection
$connection->close();
?>