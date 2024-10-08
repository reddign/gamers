<?php
// Start the session to access session variables
session_start();
?>
<html>
<head>
    <title><?PHP echo $pageName; ?></title>
    <link rel="stylesheet" type="text/css" href="<?PHP echo url(); ?>/stylesheets/index.css">
    <link rel="stylesheet" type="text/css" href="<?PHP echo url(); ?>/stylesheets/about.css">
<?php
//load extra css files if the page has an array of $cssFiles
if(isset($cssFiles) && is_array($cssFiles) && count($cssFiles)>0 ){
    $url=url();
    foreach($cssFiles as $cssfile){
        echo '<link rel="stylesheet" type="text/css" href="'.$url.'/stylesheets/'.$cssfile.'">';
    }
}

?>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
//load extra js files if the page has an array of $jsFiles
if(isset($jsFiles) && is_array($jsFiles) && count($jsFiles)>0 ){
    $url=url();
    foreach($jsFiles as $jsfile){
        echo "<script src='".$jsfile."'></script>";
    }
}

?>

</head>