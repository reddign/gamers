<?php
require_once "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$ID = $_POST['ID'];
$game = $_POST['game'];
$score = $_POST['score'];
$date = $_POST['date'];
$username = $_POST['username'];

//SQL query
$sql = "INSERT INTO highscores (ID, game, score, date, username) VALUES (?, ?, ?, ?, ?)";
$result = $connection->prepare($sql);
$result->bindParam(1, $ID);
$result->bindParam(2, $game);
$result->bindParam(3, $score);
$result->bindParam(4, $date);
$result->bindParam(5, $username);

execute($result)
?>