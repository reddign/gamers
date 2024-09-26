<?php
//this is where the map generation algorithm will go
require_once '../data_src/api/wordsearch/read.php';
require_once '../data_src/api/wordsearch/word.php';
 
//TODO organize program into functions
function generateMap($size){
    $words = Get_WordBank(5, ["DORMS","EXPERTISE","TOOLS","LANGUAGES"]) // return 5 words from any of the categories
    //$words = []; //arbitrary example
    //$words[] = 'BLUEJAY';
    //$words[] = 'CONRAD';
    //$angle = 0; //Will be randomly assigned int between 0 and 7 (inclusive). 
    $xmod = 0;
    $ymod = 0;
    $size = 15;
    $map = [];
    $map = fillMap($map)
}

//Either generate the map (with default params), or fill in black spaces
function fillMap($map, $char = '&nbsp;', $size = 15) {
    //Fill board with blank spaces
    if($char == '&nbsp;') {
        for ($i = 0; $i < $size; $i++) {
            $col = [];
            for ($j = 0; $j < $size; $j++) {
                $col[] = $char; 
            }
            $map[] = $col;
        }
    }
    else {
        //TODO fill the board with random letters (that dont spell another word in the list *check this*)
        for ($i = 0; $i < $size; $i++) {
            $innerList = $map[$i];
            for ($j = 0; $j < $size; $j++) {
                if ($innerList[$j] == '&nbsp;'){
                    $innerList[$j] = chr(random_int(65, 90)); //asigns a random letter to $innerList[$j]
                }
            }
            $map[$i] = $innerList;
        }
    }
    return $map;
}



function isValidPlace(){

}
function placeWord(){

}
//Place words
foreach($words as $word) {
    $col = random_int(0,$size-1);
    $row = random_int(0,$size-1);
    //Determine xmod and ymod
    $word->angle =  random_int(0,7);
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
    //TODO validate placement better
    //check to see if word would go off the board
    while($row+(strlen($word)*$xmod) >= $size || $row-(strlen($word)*$xmod) < 0) {
        $row = random_int(0,$size-1);
    }
    while($col+(strlen($word)*$ymod) || $col-(strlen($word)*$ymod) < 0) {
        $col = random_int(0,$size-1);
    }
    //TODO: handle collisions better  
    //check to see if the word would cover another word 
    $i = 0; //defined here to iterate. might be unnecessary
    $isvalid = false;
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
    //assign start point
    $word->start = ($col, $row);
    //add letters of word to nestedList
    for ($i = 0; $i < strlen($word); $i++) {
        $nestedList[$col+($i*$ymod)][$row+($i*$xmod)] = $word[$i];
        //store the end point during the last iteration
        if($i == strlen($word) - 1){
            $word->end = ($col+($i*$ymod), $row+($i*$xmod))
        } 
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