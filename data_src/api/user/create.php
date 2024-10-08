<?php
require_once "../includes/db_connect.php"; // Follow the lines

$username = $_POST["user"]; // Receive the username
$email = $_POST["email"]; // Get email
$firstname = $_POST["first"];

$initialname = isset($_SESSION['username']) ? $_SESSION['username'] :'';  

// We're doing it the hard way I guess
$sql = $connection->prepare("INSERT INTO user (username, email, firstname, date) VALUES (?, ?, ?, DATE_FORMAT(NOW(), '%Y-%m-%d'));");
$sql->bind_param("sss", $username, $email, $firstname); // No SQLi allowed
$sql->execute();

echo json_encode($response);

// Close the database connection
$sql->close();
$connection->close();

// After adding the username to the database, redirect to trivia.php
// Actually, redirect to visitor first
$_SESSION["username"] = $username;
header("Location: ../visitor/create.php");
exit();
?>
