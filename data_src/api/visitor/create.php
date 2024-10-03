<?php

    session_start();
    require_once "../includes/db_connect.php";

    if (!isset($_SESSION["username"])) header("Location: ../../../web_src/general/user.php");

    $sql = $connection->prepare("INSERT INTO visitor (username, num_played_hangman, num_played_flappy, num_played_2048) VALUES (?, ?, ?, ?);");
    $sql->bind_param("siii", $_SESSION["username"], $_SESSION["hangman"], $_SESSION["flappy"], $_SESSION["twozerofoureight"]);
    $sql->execute();

    $sql->close();
    $connection->close();

    header("Location: ../../../web_src/trivia/trivia.php");

?>