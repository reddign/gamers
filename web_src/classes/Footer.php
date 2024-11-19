<?php

class Footer {
    private $text;
    private $socialLinks = '<p>Connect with us: <br>
    <a href="https://www.facebook.com/etowncollege/" class="fa fa-facebook"></a>
    <a href="https://www.instagram.com/etowncollege/" class = "fa fa-instagram"></a>
    <a href="https://twitter.com/EtownCollege?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class = "fa fa-twitter"></a>
    <a href="https://www.linkedin.com/school/elizabethtown-college/" class = "fa fa-linkedin"></a></p>';

    public function __construct($text) {
        $this->text = $text;
    }

    public function render() {

        
    
        return "<footer><p>{$this->text}</p>{$this->socialLinks}</footer>";
    }
}
