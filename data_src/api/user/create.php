<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$username = $_POST["user"]; // Receive the username
$email = $_POST["email"]; // Get email
$firstname = $_POST["first"];

// We're doing it the hard way I guess
$sql = $connection->prepare("INSERT INTO user (username, email, firstname, date) VALUES (?, ?, ?, DATE_FORMAT(NOW(), '%Y-%m-%d'));");
$sql->bind_param("sss", $username, $email, $firstname); // No SQLi allowed
$sql->execute();

echo json_encode($response);

// Close the database connection
$sql->close();
$connection->close();

// After adding the username to the database, redirect to trivia.php
header("Location: ../../../web_src/trivia/trivia.php");
exit();
?>
