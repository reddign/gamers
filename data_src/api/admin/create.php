<?php
require_once "../includes/db_config.php";

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if ($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

if (!isset($_POST['username'], $_POST['password'])) {
    exit('Please complete the registration form!');
}

// Forces password to be long enough
// if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
// 	exit('Password must be between 5 and 20 characters long!');
//     header("Location: ../../../web_src/general/register.php");
// }

// Check if chosen username is used.
if ($qry = $connection->prepare("SELECT adminID, password FROM admin WHERE username = ?")) {
    $qry->bind_param("s", $_POST["username"]);
    $qry->execute();
    $qry->store_result();

    // If username is found
    if ($qry->num_rows > 0) {
        echo "Username exists, please choose another!";
        header("Location: ../../../web_src/general/register.php");
    } else {
        // Adds to admin table
        if ($qry = $connection->prepare("INSERT INTO admin (username, password) VALUES (?, ?)")) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing for security
            $qry->bind_param("ss", $_POST['username'], $password); // No SQLi allowed
            $qry->execute();
            header("Location: ../../../web_src/general/login.php");
        }
    }
    $qry->close();
    

} else {
    echo "Incorrect username or password, try again.";
    header("Location: ../../../web_src/general/login.php");
}



// $sql = "SELECT * FROM admin WHERE username = ?";
// $sql->bind_param('s', $_POST['username']);
// $sql->execute();
// $data = $query->get_result();

// if ($data->num_rows > 0) {
//     echo 'Username already exists, try again';
// } else {
//     $sql = $connection->prepare("INSERT INTO admin (username, password) VALUES (?, ?);");
//     $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//     $sql->bind_param("ss", $_POST['username'], $password); // No SQLi allowed
//     $sql->execute();
// }
$connection->close();

?>