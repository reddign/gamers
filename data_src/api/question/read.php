<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$sql = "SELECT t.questionID, t.question, GROUP_CONCAT(' ', a.triv_answer ORDER BY a.answerID) AS answers
        FROM trivia t JOIN answer a USING (questionID) GROUP BY t.questionID;";

$result = $connection->query($sql);
$questions = array();

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) {
        $questions[] = "QuestionID: ".$row["questionID"]." Question: ".$row["question"]." Answers: ".$row["answers"];
    }
}

echo json_encode($questions);

// Close the database connection
$connection->close();
?>
