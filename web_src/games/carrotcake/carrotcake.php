<?php
/*
    File Title: carrotcake.php
    Description: Main php file that contains the full game
                 Also displays the navbar, title, canvas, and footer
*/
    $pageName = "Carrot Cake Collection";
    require "../../includes/functions.php";
    require "../../includes/head.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrot Cake Collection</title>
    <link rel="stylesheet" href="style.css">
    <script type="module" src="/gamers/web_src/games/carrotcake/rpg.js"></script>
    <script src="/gamers/web_src/games/carrotcake/hiddenCupcake.js"></script>
    <script src="/gamers/web_src/games/carrotcake/animation.js"></script>
</head>
<body>
<?php 
    include '../../includes/navbar.php'; 
?>
    <h1>Carrot Cake Collection</h1>
    <canvas id="game-canvas" width="320" height="120"></canvas>
</body>

<?php
     require "../../includes/footer.php";
?>

</html>