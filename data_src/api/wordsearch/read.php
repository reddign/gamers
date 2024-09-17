<?php


require_once "../includes/db_config.php";
require_once "../wordsearch/word.php";

// this should read the words from the database and provide the words in the format we need

function Get_wordBank($wordcount,$category){

    global $host;
    global $dbUsername;
    global $dbPassword;
    global $database;
    $wordBank= array();
    $connection= new mysqli($host,$dbUsername,$dbPassword,$database);
    if($connection->connect_error){
        die("Connection Error: ".$connection->connect_error);
    }
    
    $sql="select word from WordSearch_WordBank order by rand() limit ".$wordcount;
    $result = $connection->query($sql);
    
    if($result->num_rows > 0){
        while(($row = $result->fetch_assoc()) != NULL){
            $word = new Word ($row['word']);
            $wordBank[]=$word;
        }
    }
    return $wordBank;
}
print_r(Get_wordBank(9,1));

?>