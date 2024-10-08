<?php
//require_once "../../../data_src/api/includes/db_config.php";
require_once '../../../data_src/api/wordsearch/read.php';
require_once '../../../data_src/api/wordsearch/word.php';

//generateMap(15); //added for testing purposes
function generateMap($size = -1, $num_words = -1, $categories = []){
    //default value validation, making sure parameters are correct
    //TODO: Make it so that if there are not enough words in the categories selected that it only returns the most words it can.
    if($size <= 0) $size = 15;
    if($num_words <=0 ) $num_words = intval($size / 2 + .5); //returns a default value of 8 is $size is 15. 
    if ($categories == []) $categories = ["DORMS","EXPERTISE","TOOLS","LANGUAGES"];
    $words = Get_WordBank($num_words, $categories); // return a number of words from any of the categories 
    $map = [];
    //$startLetters and $flaggedSpots will be associative arrays used to check if a word is generated twice on accident. 
    $startLetters = [];
    $flaggedSpots = [];
    //generate a blank map
    for ($i = 0; $i < $size; $i++) {
        $col = [];
        for ($j = 0; $j < $size; $j++) {
            $col[] = '&nbsp;'; 
        }
        $map[] = $col;
    }
    //xmod and ymod represent the changes in row and column when iterating through map for each word.
    $xmod = 0;
    $ymod = 0;
    foreach($words as $word) {
        //the numerical value of the first letter of each word is used as the key for $startLetters and the value is an array containing the word's length and the last character
        $fl = ord(substr($word->name, 0, 1));
        if(array_key_exists($fl, $startLetters)) {
            $startLetters[$fl][] = [strlen($word->name), substr($word->name, -1)];
        }
        else {
            $startLetters[$fl] = [[strlen($word->name), substr($word->name, -1)]];
        }
        
        //assign initial random position
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
        /*TODO: Handle collisions better. Theroretically infinite loop if there is not a valid space for word at angle. 
                Potentially add counts for amount of times going through validation and after a certain amount assign another angle.
                Need to find a way to make the angle switch a function, however breaking this function into smaller ones makes it not pass $map correctly. 
        */
        //check to see if the word would cover another word 
        $isvalid = false;
        while(!$isvalid) {
            $isvalid = true;
            for ($i = 0; $i < strlen($word->name); $i++) { 
                if(!($map[$col+($i*$ymod)][$row+($i*$xmod)] == '&nbsp;'|| $map[$col+($i*$ymod)][$row+($i*$xmod)] == $word->name[$i])){
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
        //add letters of word to map
        for ($i = 0; $i < strlen($word->name); $i++) {
            $map[$col+($i*$ymod)][$row+($i*$xmod)] = $word->name[$i];
            //store the end point during the last iteration
            if($i == strlen($word->name) - 1){
                $word->end = [$col+($i*$ymod), $row+($i*$xmod)];
            } 
        }
    } //end of foreach($words as $word)
    //fill the remaining spaces to random letters
    for ($i = 0; $i < $size; $i++) {
        $innerList = $map[$i];
        for ($j = 0; $j < $size; $j++) {
            if ($innerList[$j] == '&nbsp;'){
                $rand_int = random_int(65, 90);
                //if the random number would match a key from $startLetters, it's location is added to it's value in $flaggedSpots
                if(array_key_exists($rand_int, $startLetters)){
                    $flaggedSpots[$rand_int][] = [$i, $j];
                }
                $innerList[$j] = chr($rand_int); //asigns a random letter to $innerList[$j]
            }
        }
        $map[$i] = $innerList;
    }
    //$extraWords is used so that the while loop continues until no extra words are found. $mods is used as an alternative to having to write 8 different checks for every letter.
    $extraWords = true;
    $mods = [1, -1, 0];
    while($extraWords) {
        $extraWords = false;
        //newFlaggedSpots is a new associative array made to be a new set of flaggedSpots in case a letter corresponding to one the words is randomly assigned.
        $newFlaggedSpots = [];
        foreach($startLetters as $letter => $value){
            //this check exists to prevent any letters that no longer have flagged spots from messing up the upcoming foreach loop
            if(!empty($flaggedSpots) && array_key_exists($letter, $flaggedSpots)){
                foreach($flaggedSpots[$letter] as $spot) {
                    //this is done to check if the column +/- the length (or kept the same) would have the same last letter as a valid word.
                    for($i = 0; $i < count($mods); $i++) {
                        $endCol = $spot[0] + $value[0][0] * $mods[$i]; //$value[0][0] represents the length of the word stored in $startLetters
                        if($endCol < $size && $endCol >= 0) {
                            //this is done to check if the row +/- the length (or kept the same) would have the same last letter as a valid word.
                            for($j = 0; $j < count($mods); $j++) {
                                $endRow = $spot[1] + $value[0][0] * $mods[$j];
                                if($endRow < $size && $endRow >= 0){
                                    if($map[$endCol][$endRow] == $value[0][1]){
                                        $extraWords = true;
                                        $newChar = chr($letter);
                                        //this loop makes sure the new letter is different than before
                                        while($newChar == chr($letter)){
                                            $rand_int = random_int(65, 90);
                                            $newChar = chr($rand_int);
                                        }
                                        //this replaces the original letter with our new one
                                        $map[$spot[0]][$spot[1]] = $newChar;
                                        //this checks if the new letter is one of the previously flagged spots, and if so, adds its value to a new array to be used on upcoming iterations.
                                        if(array_key_exists($rand_int, $flaggedSpots)){
                                            $newFlaggedSpots[$rand_int][] = [$spot[0], $spot[1]];
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        //this changed the set of flagged spots to only include new spots to check.
        $flaggedSpots = $newFlaggedSpots;
    }
    //Below is added for testing purposes only
    // foreach ($map as $row) { 
    //     foreach ($row as $value) {
    //         echo $value . " ";
    //     }
    //     echo "<br>";
    // }
    // echo "<br>";
    // foreach($words as $word){
    //     echo $word->name;
    //     echo "<br>";
    // }
    return [$map, $words];
}
?>