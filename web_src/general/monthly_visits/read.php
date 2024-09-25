<?php
require_once "../includes/db_config.php"; # DB connection credentials

# dding db connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

# checking if connection worked
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

# fetch number of unique visitors per month
$sql = "SELECT YEAR(time_start) AS visit_year, MONTH(time_start) AS visit_month, COUNT(DISTINCT visitor) AS num_of_visitors FROM visit GROUP BY  YEAR(time_start), MONTH(time_start) ORDER BY visit_year, visit_month";
$result = $conn->query($sql);

$monthlyVisits = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $questions[] = array(
            "visit_year" => $row["visit_year"],
            "visit_month" => $row["visit_month"],
            "num_of_visitors" => $row["num_of_visitrs"] 
        );
    }
}

# Return the data as JSON
echo json_encode($monthlyVisits);

# Close connection
$connection->close();
?>
