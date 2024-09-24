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

echo "<select name='Game'>";
  while($row -> fetch_assoc($result)){
    echo "<option value='" . $row['game_played'] . "'>" . $row['game_played'] . "</option>";
  }
  echo "</select>";

  $connection->close();
?>