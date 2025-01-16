<?php

require_once 'classes/Page.php';
require_once 'classes/Footer.php';
require_once 'classes/NavBar.php';
require_once 'classes/PageFactory.php';
require_once 'classes/MainPageContent.php';

$navLinks = [
    "Home" => ["url" => "/gamers/web_src", "icon" => "fas fa-home"],
    "About" => ["url" => "/about", "icon" => "fas fa-info-circle"],
    
    "Games" => ["url" => "/gamers/web_src/games", "icon" => "fas fa-gamepad"],
    "Login" => ["url" => "/login", "icon" => "fas fa-key"]
];

$title = "Welcome to My Website";
$footerText = "&copy; Powered by Etown CS 341";

$whichGame = isset($_GET["whichGame"])?$_GET["whichGame"]:"";
switch($whichGame){
    case "JayHunt":
        $content = "This is the JayHunt content";
        break;
    case "JtoZ":
        $content = "This is the J to Z content";
        break;
    default:
        $content = "Do not know that Game?  This might be the games menu.";
        break;


}
$page = PageFactory::createPage($title, $content, $footerText, $navLinks,["js/file1.js",'js/file3.js']);
echo $page->render();