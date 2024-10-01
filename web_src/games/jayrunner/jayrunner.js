// jayrunner.js
"use strict";

(function() {
    var username = initialUsername;
    
    function onGodotGameOver(score) {
        console.log('onGodotGameOver called with score:', score);
        document.getElementById('gameWindow').style.display = 'none';
        document.getElementById('gameOverOverlay').style.display = 'block';

        var gamePlayed = "JayRunner";
        createScore(gamePlayed, score);
    }

    function createScore(gamePlayed, score) {

        score = parseInt(score);
        
        // If username is empty, ask the user to enter a username
        if (!username) {
            username = prompt("Enter your username to submit your score:");
            if (!username) {
                console.error('Username is required to submit score.');
                return;
            }
        }

        fetch('create_score.php', {
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
                document.getElementById('gameOverOverlay').innerHTML = `
                    <div class="display-container">
                        <h2>Game Over</h2>
                        <p><strong>Username:</strong> ${data.username}</p>
                        <p><strong>Score:</strong> ${data.score}</p>
                        <p><strong>Time Played:</strong> ${data.timePlayed}</p>
                        <button id="playAgainButton">Play Again</button>
                        <button class="leaderboard">View Highscores</button>
                    </div>
                `;
                document.getElementById('playAgainButton').addEventListener('click', startGame);
            } else {
                console.error('Error submitting score:', data.message);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    function startGame() {
        document.getElementById('startScreen').style.display = 'none';
        document.getElementById('gameOverOverlay').style.display = 'none';
        var gameWindow = document.getElementById('gameWindow');
        gameWindow.style.display = 'block';
        gameWindow.innerHTML = ''; // Clear previous game

        var iframe = document.createElement('iframe');
        iframe.src = "jayrunner_exports/jayrunner.html";
        iframe.style.width = "100em";
        iframe.style.height = "50em"; 
        iframe.style.border = "none";
        gameWindow.appendChild(iframe);
    }

    window.addEventListener('message', function(event) {
        if (event.data.type === 'gameOver') {
            onGodotGameOver(event.data.score);
        }
    }, false);

    document.getElementById('startButton').addEventListener('click', startGame);

    function HSDisplay(){
        document.getElementById('startScreen').style.display = 'none';
        document.getElementById('gameOverOverlay').style.display = 'none';
        document.getElementById('HSOverlay').style.display = 'block';
    }
    
    let leaderboard = document.getElementsByClassName('leaderboard')
    for (let i = 0; i < leaderboard.length; i++) {
        leaderboard[i].addEventListener('click', HSDisplay);
    }
})();
