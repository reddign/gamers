<?php


require_once "../includes/db_config.php";
require_once "../wordsearch/word.php";

// this should read the words from the database and provide the words in the format we need
$connection= new mysqli($host,$dbUsername,$dbPassword,$database);

if($connection->connect_error){
    die("Connection Error: ".$connection->connect_error);
}
$sql="select word from WordSearch_WordBank order by rand() limit 3";
$result = $connection->query($sql);
$wordBank= array();

if($result->num_rows<=0){
    echo "No rows were selected.";
}
while(($row = $result->fetch_assoc()) != NULL){
    $word = new Word ($row['word']);
    $wordBank[]=$word;
}


?>