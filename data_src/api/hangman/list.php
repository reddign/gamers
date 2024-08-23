<?php
require_once "../includes/db_config.php";

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// Database query
$sql = "SELECT word FROM hangman;";
$result = $connection->query($sql);
$words = array();

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        $words[] = $row["word"];
    }
}

echo json_encode($words);

// Close the database connection
$connection->close();
?>
