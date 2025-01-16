<?php

require_once 'classes/Page.php';
require_once 'classes/Footer.php';
require_once 'classes/NavBar.php';
require_once 'classes/PageFactory.php';
require_once 'classes/MainPageContent.php';

$navLinks = [
    "Home" => ["url" => "/gamers/web_src", "icon" => "fas fa-home"],
    "About" => ["url" => "/about", "icon" => "fas fa-info-circle"],
    
    "Games" => ["url" => "games.php", "icon" => "fas fa-gamepad"],
    "Login" => ["url" => "/login", "icon" => "fas fa-key"]
];

$title = "Welcome to My Website";
$content = MainPageContent::render();
$footerText = "&copy; Powered by Etown CS 341";


$page = PageFactory::createPage($title, $content, $footerText, $navLinks,["js/file1.js",'js/file3.js']);
echo $page->render();