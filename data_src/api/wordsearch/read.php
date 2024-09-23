<?php


require_once "../includes/db_config.php";
require_once "../wordsearch/word.php";

// this should read the words from the database and provide the words in the format we need

function Get_WordBank($wordcount,$category){

    /*
    *This function gets a certain number of words out of the database in whatever categories
    *Requested.
    *
    *Inputs for this function
    *
    *$wordcount is an integer if given zero it will return a blank array
    *
    *$category is an array of strings that are the categories needed
    *
    *It returns an array of word objects.
    *
    */

    global $host;
    global $dbUsername;
    global $dbPassword;
    global $database;

    //define variables
    $wordBank= array();
    $sql="select word from WordSearch_WordBank 
    join WordSearch_Category using (category_id)
    where Name in (:a";

    //finish up making the $sql string
    $inc='b';
    for($i=1;$i<sizeof($category);$i++){
        $sql=$sql.",:";
        $sql=$sql.$inc;
        $inc++;
    }

    $sql=$sql.")order by rand() limit :q";

    // create a connection to the database
    $connection= new PDO("mysql:host=$host;dbname=$database",$dbUsername,$dbPassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $stmt = $connection->prepare($sql);

    // insert sql parameters
    $inc='a';
    for($i=0;$i<sizeof($category);$i++){
        $stmt->bindParam(":".$inc,$category[$i],PDO::PARAM_STR);
        $inc++;
    }
    $stmt->bindParam(":q",$wordcount,PDO::PARAM_INT);
    
    //executing the statement
    $stmt->execute();
    $data=$stmt->fetchAll();

    // returning the data in the correct format
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