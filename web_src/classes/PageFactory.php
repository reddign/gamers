<?php

class PageFactory {
    public static function createPage($title, $content, $footerText, $navLinks) {
        $footer = new Footer($footerText);
        $navbar = new NavBar($navLinks);
        return new Page($title, $navbar, $content, $footer);
    }
}