<?php
require_once "../../../../data_src/api/includes/db_config.php";

header('Content-Type: application/json');

// Get POST data
$gamePlayed = $_POST["gamePlayed"];
$score = $_POST["score"];
$username = $_POST["username"];
$userId = 1;

// Validate the data
if (empty($username)) {
    echo json_encode([
        "success" => false,
        "message" => "Username is required."
    ]);
    exit();
}

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check for connection errors
if ($connection->connect_error) {
    echo json_encode([
        "success" => false,
        "message" => "Database connection failed: " . $connection->connect_error
    ]);
    exit();
}

// Prepare and execute the SQL statement
$sql = $connection->prepare("INSERT INTO highscores (user_id, game_played, score, time_played, username) VALUES (?, ?, ?, NOW(), ?)");
$sql->bind_param("isis", $userId, $gamePlayed, $score, $username);

if (!$sql->execute()) {
    echo json_encode([
        "success" => false,
        "message" => "Database error: " . $sql->error
    ]);
    exit();
}

// Get the current time
$timePlayed = date('Y-m-d H:i:s');

// Prepare the response so gameover screen displays them, can change later to select score based on username, latest or highest rank
$response = [
    "success" => true,
    "message" => "Score submitted successfully",
    "username" => $username,
    "score" => $score,
    "timePlayed" => $timePlayed
];

echo json_encode($response);

// Close the database connections
$sql->close();
$connection->close();
