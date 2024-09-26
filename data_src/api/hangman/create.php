<?php
require_once "../includes/db_connect.php"; // Follow the lines

if (isset($_POST["word"])  &&  !empty($_POST["word"])  &&  preg_match('/^[A-Za-z]+$/',$_POST["word"])) {
    $word = $_POST["word"]; // Receive the Word of User
} else {
    $response = ["status" => "Error", "message" => "Invalid or empty"];
    echo json_encode($response);
    exit;
}

$sql = $connection->prepare("SELECT word FROM hangman WHERE word = UPPER(?);");
$sql->bind_param("s", $word);
$sql->execute();
$data = $sql->get_result();

if ($data->num_rows > 0) { // If there are more than 0 rows
    $response = ["status" => "Error", "message" => "Word is already in the database."];
} else { // If the word isn't in the database
    // We're doing it the hard way I guess
    $sql = $connection->prepare("INSERT INTO hangman (word) VALUES (UPPER(?));");
    $sql->bind_param("s", $word); // No SQLi allowed
    $sql->execute();

    $response = ["status" => "success", "message" => "Word added successfully."];
}

echo json_encode($response);

$sql->close();
// Close the database connection
$connection->close();
?>
