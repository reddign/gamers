<?php
require_once "../includes/db_config.php";

session_start();

echo '<script>src="./temp.js"</script>';

require "../includes/db_config.php";
$information = file_get_contents('php://input');
$data = json_decode($information);
//Get the posted data
$score = $data->score;
$game = $data->game;
$username = $data->user;

//Connect to a Database
$mysqli = new mysqli($host,$dbUsername,$dbPassword,$database);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

//Prepare and execute the SQL statement
$stmt = $mysqli->prepare("INSERT INTO highscores
(username,game_played,score,time_played)
VALUES
(?,?,?,NOW())");
$stmt->bind_param("sss",$username, $game, $score);
$stmt->execute();
$stmt->close();
$mysqli->close();

echo "Sent scores";

?>
