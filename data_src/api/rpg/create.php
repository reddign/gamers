
<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

// TODO: Get username, score, and maybe time?
// Store in the database


$connection->close();
?>