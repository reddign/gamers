<?php
//this is where the map generation algorithm will go
require_once '../data_src/api/wordsearch/read.php';
require_once '../data_src/api/wordsearch/word.php';
//need another require for when word bank generation happens. 

$words = Get_WordBank(5, ["DORMS","EXPERTISE","TOOLS","LANGUAGES"]) // return 5 words from any of the categories
//$words = []; //this process will be a for loop once the word bank is made, but for now I will use arbitrary examples
//$words[] = 'BLUEJAY';
//$words[] = 'CONRAD';
//$angle = 0; //Will be randomly assigned int between 0 and 7 (inclusive). 
$xmod = 0;
$ymod = 0;

//$words = Get_wordBank()

//Generate a blank map to size 
$size = 15;
$nestedList = [];
//Fill board with blank spaces
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
    //Determine xmod and ymod
    $word
    switch($angle) {
        case 0:
            $xmod = 1;
            $ymod = 0;
            break;
        case 1:
            $xmod = 1;
            $ymod = -1;
            break;
        case 2:
            $xmod = 0;
            $ymod = -1;
            break;
        case 3:
            $xmod = -1;
            $ymod = -1;
            break;
        case 4:
            $xmod = -1;
            $ymod = 0;
            break;
        case 5:
            $xmod = -1;
            $ymod = 1;
            break;
        case 6:
            $xmod = 0;
            $ymod = 1;
            break;
        case 7:
            $xmod = 1;
            $ymod = 1;
            break;
    }
    $i = 0; //defined here to iterate.
    //check to see if word would go off the board
    while($row+strlen($word) >= $size) {
        $row = random_int(0,$size-1);
    }
    $isvalid = false;
    //check to see if the word would cover another word
    while(!$isvalid) {
        $isvalid = true;
        for ($i = 0; $i < strlen($word); $i++) {
            if($nestedList[$col+($i*$ymod)][$row+($i*$xmod)] != '&nbsp;'){
                $isvalid = false;
                $col = random_int(0,$size-1);
                break;
            } 
        }
    }
    //add letters of word to nestedList
    for ($i = 0; $i < strlen($word); $i++) {
        $nestedList[$col+($i*$ymod)][$row+($i*$xmod)] = $word[$i]; 
    }
}
//print the board - added for testing
for ($i = 0; $i < $size; $i++) {
    for ($j = 0; $j < $size; $j++) {
        echo $nestedList[$i][$j];
    }
    echo "<br>";
}
?>