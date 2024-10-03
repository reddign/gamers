<?php
require_once "../includes/db_config.php";
session_start();

// Output the CSS link directly before any HTML output
echo '<link rel="stylesheet" href="/gamers/data_src/docs_files/style.css">';

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$Url = "../../../web_src/games/menu.php";
echo "<a href='$Url'><button id='menu_button'>Return to Menu</button></a>";

<<<<<<< Updated upstream
function dropdown($conn){

  // SQL query
  $sql = "SELECT DISTINCT game_played FROM highscores;";
  $result = $conn->query($sql);

  // Dropdown
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

function AfterScores($game, $connection){

    // SQL query to get the top 10 scores for the specific game
    $sql =  $connection -> prepare("SELECT username, score FROM highscores WHERE game_played = ? ORDER BY score DESC LIMIT 10");
    $sql -> bind_param("s", $game);
    $sql -> execute();
    $result = $sql -> get_result();

    // Display the results
    $if($result -> num_rows > 0){
      echo '<table style="width:100%">';
      echo '<tr>';
      echo '<th> -Username- </th> <th> -Score- </th>';
      echo '</tr>';
      while($row = $result -> fetch_assoc()){
        echo '<tr>';
        echo '<td> ' . $row['username'] . ' </td>';
        echo '<td> ' . $row['score'] . ' </td>';
        echo '</tr>';
      }
      echo '</table>';
    }

    return $results;  // Return the top 10 scores
}

// Actually calls the dropdown menu
=======
// Call the dropdown function to display it next to the button
>>>>>>> Stashed changes
dropdown($connection);

function dropdown($conn){
    // SQL Query
    $sql = "SELECT DISTINCT game_played FROM highscores;";
    $result = $conn->query($sql);

    // Dropdown Selection
    $selectGame = isset($_POST['game']) ? $_POST['game'] : '';
    echo '<form method="POST" action="">';
    echo '<select name="game" onchange="this.form.submit()">';
    echo '<option value="">--Select Game--</option>';

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
            $selected = ($row['game_played'] == $selectGame) ? 'selected' : '';
            echo '<option value="' . $row['game_played'] . '"' . $selected . '>' . $row['game_played'] . '</option>';
        } 
    }
    echo '</select>';
    echo '</form>';

    // Display high scores if a game is selected
    if (!empty($selectGame)) {
        displayScores($conn, $selectGame);
    }
}

// High Scores
function displayScores($connection, $game) {
    echo "<br>";

    // Prepare and execute the SQL statement
    $stmt = $connection->prepare("SELECT username, score, time_played FROM highscores WHERE game_played = ? ORDER BY score DESC LIMIT 10");
    $stmt->bind_param("s", $game);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results in a table
    if ($result->num_rows > 0) {
        echo '<table class="score-table">';
        echo '<tr>';
        echo '<th> Username </th><th> Score </th> <th> Time </th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';    // Use htmlspecialchars to avoid XSS
            echo '<td> ' . htmlspecialchars($row['username']) . ' </td>';
            echo '<td> ' . htmlspecialchars($row['score']) . ' </td>';
            echo '<td> ' . htmlspecialchars($row['time_played']) . ' </td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No scores available for the selected game.";
    }
}

$connection->close();
?>
