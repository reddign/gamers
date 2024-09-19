<?php
require_once "../../data_src/api/includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

//SQL query
$sql = $connection->prepare("SELECT DISTINCT game_played FROM highscores;");
$sql->execute();
$result = $sql->get_result();

//If there are results
if($result->num_rows > 0) {
  echo "Select game";
  foreach ($row = $r_set->fetch_assoc()) {
  echo "<option value=$row[id]>$row[name]</option>";
  }
  echo "</select>";
  }
  //If there has been no scores set
  else{
    echo "0 results";
  }
  $conn->close();

?>
