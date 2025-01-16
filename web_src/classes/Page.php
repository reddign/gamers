<?php

class Page {
    private $title;
    private $content;
    private $footer;
    private $navbar;
    private $jsFileArray;

    public function __construct($title, NavBar $navbar, $content, Footer $footer,$jsFileArray) {
        $this->title = $title;
        $this->navbar = $navbar;
        $this->content = $content;
        $this->footer = $footer;
        $this->jsFileArray = $jsFileArray;
    }

    public function render() {
        return "
            <!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>{$this->title}</title>
                
                <link rel='stylesheet' type='text/css' href='stylesheets/about.css'>
   <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    {$this->makeJsFileLinks()}
            </head>
            <body>
                {$this->navbar->render()}
                <main>
                    {$this->content}
                </main>
                {$this->footer->render()}
            </body>
            </html>
        ";
    }
    function makeJsFileLinks(){
        $linksString = "";
        //TODO:
        //Loop of $this->jsFileArray
        //making proper html for each file and adding it
        //to the $linksString
        
        return $linksString;

    }
}
