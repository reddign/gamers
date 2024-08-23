<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$question = "SELECT t.question AS question FROM trivia t JOIN answer a ON t.questionID = a.questionID 
    ORDER BY RAND() LIMIT 1;"; // Choose a random question
$qResult = $connection->query($question);

if ($qResult->num_rows > 0) {
    $row = $qResult->fetch_assoc();
    $question = $row['question'];

    // Retrieve all answers for a selected question
    $answerSql = "SELECT triv_answer AS answer, is_Correct AS isCorrect FROM answer WHERE questionID = 
        (SELECT questionID FROM trivia WHERE question = '$question');"; // Uses the selected question; Thought I'd never see a subquery again
    $aResult = $connection->query($answerSql);
    $answers = []; // A list

    while ($row = $aResult->fetch_assoc()) {
        $answers[] = [
            'answer' => $row['answer'],
            'isCorrect' => ($row['isCorrect'] == 1) ? true : false // Marks if answer is correct or not
        ];
    }
    $qResponse = [
        'question' => $question,
        'answers' => $answers
    ];

    echo json_encode($qResponse);
}

// Close the database connection
$connection->close();
?>
