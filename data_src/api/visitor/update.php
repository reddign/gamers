<?php

    session_start();
    require_once "../includes/db_connect.php";

    if (!isset($_SESSION["username"])) header("Location: ../../../web_src/general/user.php");

    $sql = $connection->prepare("UPDATE visitor SET num_played_hangman = ?, num_played_flappy = ?, num_played_2048 = ? WHERE username LIKE ?;");
    $sql->bind_param("iiis", $_SESSION["hangman"], $_SESSION["flappy"], $_SESSION["twozerofoureight"], $_SESSION["username"]);
    $sql->execute();
    
    header("Location: ../../../web_src/trivia/trivia.php");

?>