
<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// TODO: Create a sql query to extract the necessary rows for the leaderboard
// Get individual top tens - so each player can only be in the top ten once
$sql = "SELECT username, score, time FROM...;"; 

$result = $connection->query($sql);

// json encode?

// Close the database connection
$connection->close();
?>