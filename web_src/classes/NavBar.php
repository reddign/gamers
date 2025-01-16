<?php

class NavBar {
    private $links = [];

    public function __construct($links = []) {
        $this->links = $links;
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
