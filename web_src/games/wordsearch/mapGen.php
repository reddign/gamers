<?php
require_once "../../../data_src/api/includes/db_config.php";
require_once '../../../data_src/api/wordsearch/read.php';
require_once '../../../data_src/api/wordsearch/word.php';

generateMap(15);
function generateMap($size = -1, $num_words = -1, $categories = []){
    if($size <= 0) $size = 15;
    if($num_words <=0 ) $num_words = intval($size / 3 + .5); 
    if ($categories == []) $categories = ["DORMS","EXPERTISE","TOOLS","LANGUAGES"];
    $words = Get_WordBank(5, $categories); // return 5 words from any of the categories 
    $size = 15;
    $map = [];
    for ($i = 0; $i < $size; $i++) {
        $col = [];
        for ($j = 0; $j < $size; $j++) {
            $col[] = '&nbsp;'; 
        }
        $map[] = $col;
    }
    $xmod = 0;
    $ymod = 0;
    foreach($words as $word) {
        $col = random_int(0,$size-1);
        $row = random_int(0,$size-1);
        //Determine xmod and ymod
        $word->angle =  random_int(0,7);
        switch($word->angle) {
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
        //check to see if word would go off the board
        while($row+(strlen($word->name)*$xmod) >= $size || $row+(strlen($word->name)*$xmod) < 0) {
            $row = random_int(0,$size-1);
        }
        while($col+(strlen($word->name)*$ymod) >= $size || $col+(strlen($word->name)*$ymod) < 0) {
            $col = random_int(0,$size-1);
        }
        //TODO: handle collisions better  
        //check to see if the word would cover another word 
        $isvalid = false;
        while(!$isvalid) {
            $isvalid = true;
            for ($i = 0; $i < strlen($word->name); $i++) {
                if($map[$col+($i*$ymod)][$row+($i*$xmod)] != '&nbsp;'){
                    $isvalid = false;
                    $row = random_int(0,$size-1);
                    $col = random_int(0,$size-1);
                    while($row+(strlen($word->name)*$xmod) >= $size || $row+(strlen($word->name)*$xmod) < 0) {
                        $row = random_int(0,$size-1);
                    }
                    while($col+(strlen($word->name)*$ymod) >= $size || $col+(strlen($word->name)*$ymod) < 0) {
                        $col = random_int(0,$size-1);
                    }
                    break;
                } 
            }
        }
        //assign start point
        $word->start = [$col, $row];
        //add letters of word to nestedList
        for ($i = 0; $i < strlen($word->name); $i++) {
            $map[$col+($i*$ymod)][$row+($i*$xmod)] = $word->name[$i];
            //store the end point during the last iteration
            if($i == strlen($word->name) - 1){
                $word->end = [$col+($i*$ymod), $row+($i*$xmod)];
            } 
        }
    }
    for ($i = 0; $i < $size; $i++) {
        $innerList = $map[$i];
        for ($j = 0; $j < $size; $j++) {
            if ($innerList[$j] == '&nbsp;'){
                $innerList[$j] = chr(random_int(65, 90)); //asigns a random letter to $innerList[$j]
            }
        }
        $map[$i] = $innerList;
    }
    return $map, $words;
}
?>