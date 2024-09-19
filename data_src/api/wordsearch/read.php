<?php


require_once "../includes/db_config.php";
require_once "../wordsearch/word.php";

// this should read the words from the database and provide the words in the format we need

function Get_WordBank($wordcount,$category){

    global $host;
    global $dbUsername;
    global $dbPassword;
    global $database;

    $wordBank= array();
    $sql="select word from WordSearch_WordBank 
    join WordSearch_Category using (category_id)
    where Name=:c
    order by rand() limit :q";

    $connection= new PDO("mysql:host=$host;dbname=$database",$dbUsername,$dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    
    
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":q",$wordcount,PDO::PARAM_INT);
    $stmt->bindParam(":c",$category,PDO::PARAM_STR);
    $stmt->execute();
    $data=$stmt->fetchAll();
    if(sizeof($data)>0){
        $i=0;
        while($i<sizeof($data)){
            $word = new Word ($data[$i]['word']);
            $wordBank[]=$word;
            $i++;
        }
    }
    return $wordBank;
}

?>