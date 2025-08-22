<?php

require_once 'classes/Page.php';
require_once 'classes/Footer.php';
require_once 'classes/NavBar.php';
require_once 'classes/PageFactory.php';
require_once 'classes/TriviaGamesMenu.php';
require_once 'classes/ChessLobbyPageContent.php';



$title = "Welcome to My Website";
$navLinks=[];

$footerText = "&copy; Powered by Etown CS 341";
$jsFilesNeeded = ["js/core.js"];
$whichGame = isset($_GET["whichGame"])?$_GET["whichGame"]:"";
switch($whichGame){
    case "JayHunt":
        $content = "This is the JayHunt content";
        break;
    case "JtoZ":
        $content = "This is the J to Z content";
        break;
    case "chess":
        $content = ChessLobbyPageContent::render();
        break;
    default:
        $content = TriviaGamesMenu::render();

        break;


}
$page = PageFactory::createPage($title, $content, $footerText, $navLinks,$jsFilesNeeded);
echo $page->render();