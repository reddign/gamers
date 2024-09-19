<?php
require_once "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli("localhost", "root", "", "triviagames");

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

//SQL query
$sql = "SELECT DISTINCT game_played FROM highscores;";
$result = $connection->query($sql);

//If there are results
// if($result->num_rows > 0) {
//   echo "<Select game>";
   while($row = $result->fetch_assoc()) {
//     echo "<option value='" . $row['game_played'] . "</option>";
echo $row['game_played'];
  }
//   echo "</select>";
//   }
//   //If there has been no scores set
//   else{
//     echo "0 results";
//   }
  $connection->close();

?>
