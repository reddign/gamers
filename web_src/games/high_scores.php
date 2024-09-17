<?php
require_once "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

//SQL query
$sql = "SELECT /* Column names*/";
$result = $connection->query($sql);

//If there are results
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo /* Add data */;
    }
  } 
  //If there has been no scores set
  else{
    echo "0 results";
  }
  $conn->close();

?>