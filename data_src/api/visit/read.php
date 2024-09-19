<?php
require_once "../includes/db_config.php"; // Follow the lines
// Starts session
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please complete the registration form!');
}



?>
