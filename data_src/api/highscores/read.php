<?php
require "../includes/db_config.php"
function getTopScores($game) {

    try {
        $connection = new mysqli($host, $dbUsername, $dbPassword, $database);

    if($connection->connect_error) {
        die("Connection failed: ".$connection->connect_error);
    }

    $information = file_get_contents('php://input');
    $data = json_decode($information);
        // SQL query to get the top 10 scores for the specific game
        $query = 'SELECT username, score FROM highscores WHERE game_played = ? ORDER BY highscore DESC LIMIT 10';

        // Prepare and execute the SQL statement
        $stmt = $connection->prepare($query);
        $stmt->execute([$game]);

        // Fetch the results
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $results;  // Return the top 10 scores

    } catch (PDOException $e) {
        // Handle any errors
        echo 'Error: ' . $e->getMessage();
    }
}
?>