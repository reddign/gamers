<?php
require_once "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

//SQL query
$sql = "SELECT DISTINCT game_played FROM highscores;";
$result = $connection->query($sql);

if($result->num_rows > 0){
  echo '<select name="game">';
  echo '<option value="' . $none . '">' . "--Select Game--" . '</option>';
  while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row['game_played']. '">' . $row['game_played'] . '</option>';
    $title = $row['game_played'];
}
echo '</select>';
echo $title;
}

$sql = "SELECT username, game_played, score, time_played FROM highscores WHERE game_played = 'Pong'";
$result = $connection->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
  echo "<br>";
  // Output data for each row
  while ($row = $result->fetch_assoc()) {
      echo "Username: " . $row["username"] . " - Game: " . $row["game_played"] . " - Score: " . $row["score"] . " - Time Played: " . $row["time_played"] . "<br>";
  }
} else {
  echo "No results found.";
}

  $connection->close();
?>