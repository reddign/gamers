<?php
//this is where the map generation algorithm will go
//require_once '../data_src/api/wordsearch/read.php';
//require_once '../data_src/api/wordsearch/word.php';
//need another require for when word bank generation happens. 

$words = []; //this process will be a for loop once the word bank is made, but for now I will use arbitrary examples
$words[] = 'BLUEJAY';
$words[] = 'CONRAD';

//$words = Get_wordBank()

//Generate a blank map to size 
$size = 10;
$nestedList = [];
//Fill board with random spaces
for ($i = 0; $i < $size; $i++) {
    $innerList = [];
    for ($j = 0; $j < $size; $j++) {
        $innerList[] = '&nbsp;'; 
    }
    $nestedList[] = $innerList;
}
//Place words
foreach($words as $word) {
    $col = random_int(0,$size-1);
    $row = random_int(0,$size-1);
    $i = 0;
    //check to see if word would go off the board
    while($row+strlen($word) >= $size) {
        $row = random_int(0,$size-1);
    }
    $isvalid = false;
    //check to see if the word would cover another word
    while(!$isvalid) {
        $isvalid = true;
        for ($i = 0; $i < strlen($word); $i++) {
            if($nestedList[$col][$row+$i] != '&nbsp;'){
                $isvalid = false;
                $col = random_int(0,$size-1);
                break;
            } 
        }
    }
    //add letters of word to nestedList
    for ($i = 0; $i < strlen($word); $i++) {
        $nestedList[$col][$row+$i] = $word[$i]; 
    }
}
//print the board
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        echo $nestedList[$i][$j];
    }
    echo "<br>";
}
?>