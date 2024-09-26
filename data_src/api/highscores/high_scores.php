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

$selectGame = isset($_POST['game']) ? $_POST['game'] : '';
echo '<form method="POST" action="">';
echo '<select name="game" onchange="this.form.submit()">';
echo '<option value="">--Select Game--</option>';

if($result->num_rows > 0){
  while ($row = $result->fetch_assoc()) {
    $selected = ($row['game_played'] == $selectGame) ? 'selected' : '';
    echo '<option value="' . $row['game_played']. '"' . $selected . '>' . $row['game_played'] . '</option>';
}
echo '</select>';
echo '</form>';
}

echo $selectGame;
echo $selected;

// Check if there are results
if (!empty($selectGame)) {
  echo "<br>";
  // Output data for each row
  $sql =  $connection -> prepare("SELECT username, game_played, score, time_played FROM highscores WHERE game_played = ?");
  $sql -> bind_param("s", $selectGame);
  $sql -> execute();
  $result = $sql -> get_result();

  if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
      echo "Username: " . $row['username'] . " - Game: " . $row['game_played'] . " - Score: " . $row['score'] . " - Time: " . $row['time_played'] . "<br>";
    }
  }
}

  $connection->close();
?>