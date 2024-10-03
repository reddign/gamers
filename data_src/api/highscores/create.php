<?php
require_once "../includes/db_config.php";

echo '<script>sendScores();</script>';

session_start();

require "../db_config.php";
$information = file_get_contents('php://input');
$data = json_decode($information);
//Get the posted data
$score = $data->score;
$game = $data->game;
$username = $data->user;

//Prepare a SQL statement
$sql = "INSERT INTO  highscores;
(username,game_played,score,time_played)
VALUES
(?,?,?,.NOW())";

$sql->bind_param("sss",$username, $game, $score);

//Connect to a Database
$mysqli = new mysqli($host,$database_user,$database_password,$database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

//Prepare and execute the SQL statement
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->close();
$mysqli->close();



?>
