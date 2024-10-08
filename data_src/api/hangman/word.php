<?php
require_once "../includes/db_connect.php"; // Follow the lines

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
