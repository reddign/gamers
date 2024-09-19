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

        // Function to handle game over event. pulls score from our iframe
        function onGodotGameOver(score) {
            console.log('onGodotGameOver called with score:', score);
            // Hide game window
            document.getElementById('gameWindow').style.display = 'none';
            // Show game over overlay
            document.getElementById('gameOverOverlay').hidden = false;

            var gamePlayed = "JayRunner";
            submitScore(gamePlayed, score);
        }

        // Function to submit score to database
        function submitScore(gamePlayed, score) {
            // TODO: For when we can get the userID and username for when DataBase group fixes it. currently these are null and it prompt user to enter a username
            var userId = "<?php echo isset($_SESSION['userID']) ? $_SESSION['userID'] : ''; ?>";
            var username = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"; 

            // If username is empty, ask the user to enter a username
            if (!username) {
                username = prompt("Enter your username to submit your score:");
                if (!username) {
                    console.error('Username is required to submit score.');
                    return;
                }
            }

            fetch('submit_score.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `gamePlayed=${encodeURIComponent(gamePlayed)}&score=${encodeURIComponent(score)}&username=${encodeURIComponent(username)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Score submitted:', data);
                        // Update game over overlay with submitted score, username, and time played
                        document.getElementById('gameOverOverlay').innerHTML = `
                            <div class="display-container">
                                <h2>Game Over</h2>
                                <p><strong>Username:</strong> ${data.username}</p>
                                <p><strong>Score:</strong> ${data.score}</p>
                                <p><strong>Time Played:</strong> ${data.timePlayed}</p>
                            </div>
                        `;

                        // Show game over overlay
                        document.getElementById('gameOverOverlay').style.display = 'block';
                    } else {
                        console.error('Error submitting score:', data.message);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }


        // load game when startbutton clicked
        document.getElementById('startButton').addEventListener('click', function() {
            document.getElementById('startScreen').style.display = 'none';
            var gameWindow = document.getElementById('gameWindow');
            gameWindow.style.display = 'block';

            var iframe = document.createElement('iframe');
            iframe.src = "jayrunner_exports/jayrunner.html";
            iframe.style.width = "100em";
            iframe.style.height = "50em"; 
            iframe.style.border = "none";
            gameWindow.appendChild(iframe);

            window.addEventListener('message', function(event) {
                if (event.data.type === 'gameOver') {
                    onGodotGameOver(event.data.score);
                }
            }, false);
        });

    </script>
</body>
</html>