<?PHP
require_once "../includes/db_config.php";
session_start();

// Output the CSS link directly before any HTML output
echo '<link rel="stylesheet" href="/gamers/data_src/docs_files/style.css">';

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}



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

    $stmt->close();
}


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