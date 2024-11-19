<?php

require_once 'classes/Page.php';
require_once 'classes/Footer.php';
require_once 'classes/NavBar.php';
require_once 'classes/PageFactory.php';

$navLinks = [
    "Home" => "/",
    "About" => "/about",
    "Contact" => "/contact"
];

$title = "Welcome to My Website";
$content = "<h1>Hello, World!</h1><p>This is the main content of the page.</p>";
$footerText = "&copy; Powered by Etown CS 341";



$page = PageFactory::createPage($title, $content, $footerText, $navLinks);
echo $page->render();
