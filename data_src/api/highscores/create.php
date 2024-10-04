<?php
require "../includes/db_config.php";

session_start();

echo '<script src="./temp.js"></script>';

$information = file_get_contents('php://input');
error_log($information);
$data = json_decode($information);

//Get the posted data
$ID = isset($_POST['userID']) ? $_POST['userID'] : '';

$game = isset($_POST['game']) ? $_POST['game'] : '';

//if(isset($_POST['score'])) $score = $_POST['score'];
$score = isset($_POST['score']) ? $_POST['score'] : '';

$timeplayed = isset($_POST['timeplayed']) ? $_POST['timeplayed'] : '';

$username = isset($_POST['username']) ? $_POST['username'] : '';

//Connect to a Database
$mysqli = new mysqli($host,$dbUsername,$dbPassword,$database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

//Prepare and execute the SQL statement
$stmt = $mysqli->prepare("INSERT INTO highscores
(user_id,game_played,score,time_played,username)
VALUES
(?,?,?,?,?)");
$stmt->bind_param("isiss",$ID,$game, $score, $timeplayed, $username);
$stmt->execute();
$stmt->close();
$mysqli->close();

echo "Sent scores";

?>
