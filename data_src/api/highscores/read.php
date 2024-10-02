<?php
require "../includes/db_config.php";
session_start();

// Output the CSS link directly before any HTML output
echo '<link rel="stylesheet" href="/gamers/data_src/docs_files/style.css">';

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

echo '<div>';
$Url = "../../../web_src/games/menu.php";
echo "<a href='$Url'><button id='menu_button'>Return to Menu</button></a>";

// Call the dropdown function to display it next to the button
dropdown($connection);
echo '</div>'; // Close the flex container

function dropdown($conn) {
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
            echo '<option value="' . htmlspecialchars($row['game_played']) . '"' . $selected . '>' . htmlspecialchars($row['game_played']) . '</option>';
        } 
    }
    echo '</select>';
    echo '</form>';

    // Display high scores if a game is selected
    if (!empty($selectGame)) {
        displayScores($conn, $selectGame);
    }
}

<<<<<<< HEAD
// High Scores
function displayScores($connection, $game) {
    echo "<br>";
=======

function AfterScores($game){
//Edit 1
//Edit 2
//Edit 3
//Edit 4
//Edit 5
//Edit 6
$information = file_get_contents('php://input');
$data = json_decode($information);
    // SQL query to get the top 10 scores for the specific game
    $query = 'SELECT username, score FROM highscores WHERE game_played = ? ORDER BY score DESC LIMIT 10';
>>>>>>> 1fc11e9 (Squash 1)

    // Prepare and execute the SQL statement
    $stmt = $connection->prepare("SELECT username, score, time_played FROM highscores WHERE game_played = ? ORDER BY score DESC LIMIT 10");
    $stmt->bind_param("s", $game);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results in a table
    if ($result->num_rows > 0) {
        echo '<table style="width:100%; border-collapse: collapse;">';
        echo '<tr>';
        echo '<th>Username</th> <th>Score</th> <th>Time</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';    
            echo '<td>' . htmlspecialchars($row['username']) . '</td>';
            echo '<td>' . htmlspecialchars($row['score']) . '</td>';
            echo '<td>' . htmlspecialchars($row['time_played']) . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "No scores available for the selected game.";
    }

    $stmt->close(); // Close the statement
}

$connection->close(); // Close the database connection
?>
