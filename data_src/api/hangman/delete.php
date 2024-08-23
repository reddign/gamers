<?php
require_once "../includes/db_config.php"; // Follow the lines

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

// Check if the connection was successful
if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

$word = $_POST["word"];

$sql = $connection->prepare("SELECT word FROM hangman WHERE word = UPPER(?);");
$sql->bind_param("s", $word);
$sql->execute();
$data = $sql->get_result();

if ($data->num_rows == 0) { // If nothing comes up
    // $message = ["message" => "Word is not in the Database"];
    $response = ["status" => "Error", "message" => "Word is not in the database."];
} elseif ($data->num_rows == 1) { // There should only be one row, unneccessary?
    $sql = $connection->prepare("DELETE FROM hangman WHERE word = UPPER(?);");
    $sql->bind_param("s", $word);
    $sql->execute();

    // $message = ["message" => "Deleted a word successfully", "word" => $word];
    $response = ["status" => "success", "message" => "Deleted a word."];
}

echo json_encode($response);

$sql->close();
// Close the database connection
$connection->close();
?>
