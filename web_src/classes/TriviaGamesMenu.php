<?php

class TriviaGamesMenu{
    private static $options = ["hangman"=>"Flight of the Jay",
                "flappybird"=>"Flappy Jay",
                "2048" => "2048 Etown Edition",
                "jayrunner" => "Jay Runner",
                "JayHunt" => "JayHunt",
                "wordsearch" => "Jay to Z",
                "carrotcake" => "Carrot Cake Collection",
                "ESA" => "Etown Student Adventure"];
    static function render(){
        $optionHtml = self::getOptions();
        return '<div id="welcome-message">
                    <p>Game Selection <br> Page!</p>
                </div>
                <div id="game-select">
                    <label for="game-selector">Select a game: </label>
                    <select id="game-selector" onchange="loadGame(this)">
                    '.$optionHtml.'</select>
                </div>';
    }

    static function getOptions(){
        $html = "<option value=\"\">Select a game</option>";
        foreach(self::$options as $key=>$value){
            $html .= "<option value=\"{$key}\">{$value}</option>";
        }
        return $html;

    }
}


?>