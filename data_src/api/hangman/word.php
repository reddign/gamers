<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// Database query
$query = "SELECT word FROM hangman ORDER BY RAND() LIMIT 1;";
$result = $connection->query($query);

if ($result->num_rows > 0) { 
    $row = $result->fetch_assoc(); // Go through each row
    $response = ['word' => $row['word']];
    echo json_encode($response); // if this is gone, word = '', otherwise it works
} // Handle if no word is given?

// Close the database connection
$connection->close();
?>
