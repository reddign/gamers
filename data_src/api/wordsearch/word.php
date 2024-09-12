<?php


class Word{
    public $name;
    public $length;
    public $angle=NULL;
    public $start=NULL;
    public $end=NULL;

    function __construct($name)
    {
        $this->name = $name;
        $this->length = strlen($name);
    }

}
// this is the basic word structure that goes on the board




?>