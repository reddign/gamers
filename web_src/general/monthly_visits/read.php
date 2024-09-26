<?php
error_reporting(E_ALL);  // Enable all errors
ini_set('display_errors', 1);  // Display errors



require_once "../../../data_src/api/includes/db_connect.php"; # DB connection credentials

// adding db connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// checking if connection worked
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// fetch number of unique visitors per month
$sql = "SELECT YEAR(time_start) AS visit_year, MONTH(time_start) AS visit_month, COUNT(DISTINCT visitor) AS num_of_visitors FROM visit GROUP BY  YEAR(time_start), MONTH(time_start) ORDER BY visit_year, visit_month";
$result = $connection->query($sql);

$monthlyVisits = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $monthlyVisits[] = array(
            "visit_year" => $row["visit_year"],
            "visit_month" => $row["visit_month"],
            "num_of_visitors" => $row["num_of_visitors"] 
        );
    }
}

// Return the data as JSON
echo json_encode($monthlyVisits);

// Close connection
$connection->close();
?>
