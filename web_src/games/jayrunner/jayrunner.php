<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JayRunner Game</title>
   
    <link rel="stylesheet" href="jayrunner.css">
</head>
<?php
require "../../includes/functions.php";
require "../../includes/head.php";

?>
<body>
    <?php
        require "../../includes/navbar.php";
    ?>
    
    <!-- TODO: Edit CSS to Match site Theme -->
    <div id="startScreen">
        <div class="display-container">
            <h1>JayRunner</h1>
            <h2>Team Omacron</h2>
            <button id="startButton">Start Game</button>
        </div>
    </div>

    <!-- //intially hidden -->
    <div id="gameWindow" style="display: none;"></div>

    <!-- //intially hidden -->
    <div id="gameOverOverlay" style="display: none;">
    </div>

    <script>
        // Initialize username from PHP session
        var initialUsername = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
    </script>
    
    <script src="jayrunner.js"></script>
</body>
</html>