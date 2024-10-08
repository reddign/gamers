<?php


class Word{

    /*
    *The Word structure has 5 components
    *Name is the string for the word
    *Length is it's length
    *Angle is the angle it will show up on the board
    *Start is the start coords of the word
    *End is the ending coords of the word
    */

    public $name;
    public $length;
    public $angle=NULL;
    public $start=NULL;
    public $end=NULL;

    // this sets up the structure with the name, and the length
    function __construct($name)
    {
        $this->name = $name;
        $this->length = strlen($name);
    }

}

?>