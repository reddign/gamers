<?php
require "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

echo '<div>';
$Url = "../../../web_src/games/menu.php";
echo "<a href='$Url'><button>Return to Menu</button></a>";
echo '</div>';
echo '<br>';

function dropdown($conn){

  //SQL query
  $sql = "SELECT DISTINCT game_played FROM highscores;";
  $result = $conn->query($sql);

  //Dropdown
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

  // Check if there are results
  if (!empty($selectGame)) {
    echo "<br>";
    // Output data for each row
    $sql =  $conn -> prepare("SELECT username, game_played, score, time_played FROM highscores WHERE game_played = ? ORDER BY score DESC LIMIT 10");
    $sql -> bind_param("s", $selectGame);
    $sql -> execute();
    $result = $sql -> get_result();

    if($result -> num_rows > 0){
      echo '<table style="width:100%">';
      echo '<tr>';
      echo '<th> -Username- </th> <th> -Game- </th> <th> -Score- </th> <th> -Time- </th>';
      echo '</tr>';
      while($row = $result -> fetch_assoc()){
        echo '<tr>';
        echo '<td> ' . $row['username'] . ' </td>';
        echo '<td> ' . $row['game_played'] . ' </td>';
        echo '<td> ' . $row['score'] . ' </td>';
        echo '<td> ' . $row['time_played'] . ' </td>';
        echo '</tr>';
      }
      echo '</table>';
    }
  }
}


function AfterScores($game){

  //Move code from GetTopScores in read.php into this function

}

//Actually calls the dropdown menu
dropdown($connection);

$connection->close();
?>