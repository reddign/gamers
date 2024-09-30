<?php
function getTopScores($game) {
    // Database connection parameters
    $host = 'your_host';         // e.g., localhost
    $dbname = 'your_db_name';
    $username = 'your_db_user';
    $password = 'your_db_password';

    try {
        // Establish the database connection using PDO
        $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // SQL query to get the top 10 scores for the specific game
        $query = 'SELECT * FROM highscores WHERE game_played = ? ORDER BY highscore DESC LIMIT 10';

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