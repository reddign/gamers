<?php
require_once "../includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

//SQL query
$sql = $connection->prepare("/*ENTER SQL STATEMENT*/");

/*
 - CREATE A QUERY TO FIND ALL GAMES AVAILABLE FROM THE GAMES TABLE
 - ECHO THE TOP RESULTS USING A FOR EACH LOOP FROM THE RESULTS OF THE SQL QUERY ABOVE
*/

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
  $connection->close();

?>
