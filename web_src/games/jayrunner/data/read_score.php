<?php
require_once "../../../../data_src/api/includes/db_config.php";
header('Content-Type: application/json');

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

// Prepare and execute the SQL statement to get top 10 scores
$sql = "SELECT username, score, time_played FROM highscores WHERE game_played = 'JayRunner' ORDER BY score DESC LIMIT 10";
$result = $connection->query($sql);

if (!$result) {
    echo json_encode([
        "success" => false,
        "message" => "Database error: " . $connection->error
    ]);
    exit();
}

// Fetch the results
$scores = [];
while ($row = $result->fetch_assoc()) {
    $scores[] = [
        "username" => $row["username"],
        "score" => $row["score"],
        "timePlayed" => $row["time_played"]
    ];
}

// Prepare the response
$response = [
    "success" => true,
    "scores" => $scores
];

echo json_encode($response);

// Close the database connection
$connection->close();