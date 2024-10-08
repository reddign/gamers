<?php
require_once "../includes/db_connect.php"; // Follow the lines
// Starts session
session_start();

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please complete the registration form!');
}

// SQL query
if ($qry = $connection->prepare("SELECT adminID, password FROM admin WHERE username = ?")) {
    $qry->bind_param("s", $_POST["username"]);
    $qry->execute();
    $qry->store_result();

    // If username is found
    if ($qry->num_rows > 0) {
        $qry->bind_result($id, $password);
        $qry->fetch();
        
        // Verifying password against hashed password
        if (password_verify($_POST["password"], $password)) {
            // Regenerate session id to show login status
            session_regenerate_id();
            $_SESSION["loggedin"] = TRUE;
            $_SESSION["name"] = $_POST["username"];
            $_SESSION["id"] = $id;

            // Relocates back to settings once logged in
            
            header("Location: ../../../web_src/general/index.php");
        }
        else {
            header("Location: ../../../web_src/general/login.php");
        }
    } else {
        echo "Incorrect username, try again.";
        header("Location: ../../../web_src/general/login.php");
    }
    $qry->close();
    

} else {
    echo "Incorrect username or password, try again.";
    header("Location: ../../../web_src/general/login.php");
}

// Close the database connection
$connection->close();

exit();
?>
