<?php

    require_once "../includes/db_connect.php";
    echo "This page is currently not working. See comment in code.";
    /*
    if (!isset($_GET["username"]) || empty($_GET["username"])) {

        $response = ["status" => "Error", "message" => "A username is required."];
        echo json_encode($response);

    } else {
        
        $username = $_GET["username"];
        $sql = $connection->prepare("SELECT * FROM visitor WHERE username LIKE '?'");
        $sql->bind_param("s", $username);
        $sql->execute();
        $data = $sql->get_result();

        if ($data->num_rows == 0) $response = ["status" => "Error", "message" => "Visitor not found in database."];
        else if ($data->num_rows == 1) {
            
            $sql = $connection->prepare("DELETE FROM visitor WHERE username LIKE '?'");
            $sql->bind_param("s", $username); // BROKEN LINE <--------------------------------------
            $sql->execute();
            $response = ["status" => "success", "message" => "Removed visitor from database."];

        } else $response = ["status" => "Error", "message" => "Multiple instances detected. Contact database admin(s)."];

        echo json_encode($response);
        $sql->close();
        $connection->close();

    }*/

?>