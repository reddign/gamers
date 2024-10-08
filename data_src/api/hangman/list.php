<?php
require_once "../includes/db_connect.php"; // Follow the lines

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
