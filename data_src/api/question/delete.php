<?php
require_once "../includes/db_connect.php"; // Follow the lines

if (isset($_POST["questionID"]) && !empty($_POST["questionID"])) {
    $questionID = $_POST["questionID"];
} else {
    $response = ["status" => "Error", "message" => "Question ID required."];
    echo json_encode($response);
    exit();
}

$sql = $connection->prepare("SELECT question FROM trivia WHERE questionID = (?);");
$sql->bind_param("i", $questionID);
$sql->execute();
$data = $sql->get_result();

if ($data->num_rows == 0) { // If nothing comes up
    $response = ["status" => "Error", "message" => "Question is not in the database."];
} elseif ($data->num_rows == 1) {
    $sql = $connection->prepare("DELETE FROM answer WHERE questionID = (?);");
    $sql->bind_param("i", $questionID);
    $sql->execute();

    $sql = $connection->prepare("DELETE FROM trivia WHERE questionID = (?);");
    $sql->bind_param("i", $questionID);
    $sql->execute();
    $response = ["status" => "success", "message" => "Deleted a question."];
}

echo json_encode($response);

$sql->close();
// Close the database connection
$connection->close();
?>
