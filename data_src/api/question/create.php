<?php
require_once "../includes/db_connect.php"; // Follow the lines


if (isset($_POST["question"]) && !empty($_POST["question"])) {
    $question = $_POST["question"];
    if ((isset($_POST["answer1"]) && !empty($_POST["answer1"])) && (isset($_POST["answer2"]) && !empty($_POST["answer2"])) && (isset($_POST["answer3"]) && !empty($_POST["answer3"]))) {
        $answer1 = $_POST["answer1"]; // Should be the correct one
        $answer2 = $_POST["answer2"];
        $answer3 = $_POST["answer3"];
    } else {
        $response = ["status" => "Error", "message"=> "Answers required"];
        echo json_encode($response);
        exit;
    }
} else {
    $response = ["status" => "Error", "message"=> "Question required"];
    echo json_encode($response);
    exit;
}

$sql = $connection->prepare("INSERT INTO trivia (question) VALUES (?);");
$sql->bind_param("s", $question);
$sql->execute();

$questionID = mysqli_insert_id($connection);

$sqlAns1 = $connection->prepare("INSERT INTO answer (questionID, triv_answer, is_Correct)
    VALUES (?, ?, TRUE)");
$sqlAns1->bind_param("is", $questionID, $answer1);
$sqlAns1->execute();

$sqlAns2 = $connection->prepare("INSERT INTO answer (questionID, triv_answer, is_Correct)
    VALUES (?, ?, FALSE)");
$sqlAns2->bind_param("is", $questionID, $answer2);
$sqlAns2->execute();

$sqlAns3 = $connection->prepare("INSERT INTO answer (questionID, triv_answer, is_Correct)
    VALUES (?, ?, FALSE)");
$sqlAns3->bind_param("is", $questionID, $answer3);
$sqlAns3->execute();

$response = ["status" => "success", "message" => "Question and Answers successfully added."];

echo json_encode($response);

$sql->close();
$sqlAns1->close();
$sqlAns2->close();
$sqlAns3->close();

// Close the database connection
$connection->close();
?>