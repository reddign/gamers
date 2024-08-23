<?php
require_once "../includes/db_config.php"; // Follow the lines

$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$sql = "SELECT firstname, email, date FROM user WHERE date >= date_add(NOW(), INTERVAL -3 MONTH) ORDER BY userID DESC;";

$result = $connection->query($sql);
$users = array();

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        $users[] = $row["firstname"] . " " . $row["email"] . " " . $row["date"];
    }
}

echo json_encode($users);

// Close the database connection
$connection->close();
?>
