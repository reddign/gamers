<?php

class NavBar {
    private $links = [];
    private static $defaultNavLinks = [
        "Home" => ["url" => "/gamers/web_src/index.php", "icon" => "fas fa-home"],
        "About" => ["url" => "/gamers/web_src/general/about.php", "icon" => "fas fa-info-circle"],
        
        "Games" => ["url" => "/gamers/web_src/games.php", "icon" => "fas fa-gamepad"],
        "Login" => ["url" => "/gamers/web_src/login", "icon" => "fas fa-key"]
    ];
    public function __construct($links = []) {
        if(count($links)==0){
            $this->links = self::$defaultNavLinks;
        }else{
             $this->links = $links;
        }
       
    }

    public function render() {
        $html = "<nav class='navbar navbar-expand-lg navbar bg-blue'>";
        //Logo Link
        $html .= "<a class='navbar-brand' href='general/index.php'>";
        $html .= "<img id='logo' src='includes/images/logo.png' alt='Logo' width='100px.'>";
        $html .= "</a>";

        $html .= "<div class='collapse navbar-collapse' id='navbarNav'>";            
        $html .= "<ul class='navbar-nav ml-auto'>";
       
        foreach ($this->links as $text => $info) {
            $url = $info['url'];
            $icon = isset($info['icon']) ? "<i class='{$info['icon']}'></i> " : "";
            $html .= "<li class='nav-item'><a class='navbar-link' href='{$url}'>{$icon}{$text}</a></li>";
        }
        $html .= "</ul></div></nav>";
        return $html;
    }
}
