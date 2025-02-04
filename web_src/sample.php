<?php

require_once 'classes/Page.php';
require_once 'classes/Footer.php';
require_once 'classes/NavBar.php';
require_once 'classes/PageFactory.php';

$navLinks = [
    "Home" => ["url" => "/gamers/web_src", "icon" => "fas fa-home"],
    "About" => ["url" => "/about", "icon" => "fas fa-info-circle"],
    
    "Games" => ["url" => "/gamers/web_src/games", "icon" => "fas fa-gamepad"],
    "Login" => ["url" => "/login", "icon" => "fas fa-key"]
];

$title = "Welcome to My Website";
$content = "<h1>Hello, World!</h1><p>This is the main content of the page.</p>";
$footerText = "&copy; Powered by Etown CS 341";



$page = PageFactory::createPage($title, $content, $footerText, $navLinks);
echo $page->render();
