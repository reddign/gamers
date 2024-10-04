<?php
require "../includes/db_config.php";

session_start();

/* 1) Log the incoming request for debugging
   2) Decoding the JSON input as an associative array */
$information = file_get_contents('php://input');
error_log($information);
$data = json_decode($information, true);

// Get the POST (PHP way) then if doesn't exist then get JSON data (JS way)
$userID = isset($_POST['userID']) ? $_POST['userID'] : (isset($data['user_id']) ? $data['user_id'] : '');
$game = isset($_POST['game']) ? $_POST['game'] : (isset($data['game_played']) ? $data['game_played'] : '');
$score = isset($_POST['score']) ? $_POST['score'] : (isset($data['score']) ? $data['score'] : '');
$timeplayed = isset($_POST['timeplayed']) ? $_POST['timeplayed'] : (isset($data['time_played']) ? $data['time_played'] : '');
$username = isset($_POST['username']) ? $_POST['username'] : (isset($data['username']) ? $data['username'] : '');

// Validate required fields
if (empty($userID) || empty($game) || empty($score) || empty($timeplayed) || empty($username)) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Missing required fields'
    ]);
    exit();
}

// Connect to the database
$mysqli = new mysqli($host, $dbUsername, $dbPassword, $database);
if ($mysqli->connect_errno) {
    echo json_encode([
        'status' => 'error',
        'message' => 'Failed to connect to MySQL: ' . $mysqli->connect_error
    ]);
    exit();
}


// Check if the user ID exists in the user table
$user_check = $mysqli->prepare("SELECT COUNT(*) FROM user WHERE userID = ?");
$user_check->bind_param("i", $userID);
$user_check->execute();
$user_check->bind_result($user_exists);
$user_check->fetch();
$user_check->close();

// If the user exists, insert into highscores
if ($user_exists > 0) {
    $stmt = $mysqli->prepare("INSERT INTO highscores (user_id, game_played, score, time_played, username)
                              VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $userID, $game, $score, $timeplayed, $username);
    
    if ($stmt->execute()) {
        echo json_encode([
            'status' => 'success',
            'message' => 'Score successfully sent',
            'userID' => $userID,
            'game' => $game,
            'score' => $score,
            'timeplayed' => $timeplayed,
            'username' => $username
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to insert score'
        ]);
    }
    $stmt->close();
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Error: The specified user does not exist.'
    ]);
}

$mysqli->close();



?>