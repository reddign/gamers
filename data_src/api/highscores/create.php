<?php
require_once "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$ID = $_POST['ID'];
$game = $_POST['game'];
$score = $_POST['score'];
$date = $_POST['date'];
$username = $_POST['username'];

// SQL query
$sql = "INSERT INTO highscores (ID, game, score, date, username) VALUES (?, ?, ?, ?, ?)";
$result = $connection->prepare($sql);

if ($result) {
    // Bind parameters
    $result->bind_param("ssiss", $ID, $game, $score, $date, $username); // Adjust types accordingly

    // Execute the prepared statement
    if ($result->execute()) {
        // Respond with success
        echo json_encode(["status" => "success", "message" => "Score inserted successfully."]);
    } else {
        // Respond with error
        echo json_encode(["status" => "error", "message" => "Error inserting score: " . $result->error]);
    }

    // Close the statement
    $result->close();
} else {
    echo json_encode(["status" => "error", "message" => "Error preparing statement: " . $connection->error]);
}

// Close the database connection
$connection->close();
?>
