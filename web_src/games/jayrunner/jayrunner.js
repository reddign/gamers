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
                console.log('Username submission cancelled or empty.');
                showGameOverScreen(score, true);
                return;
            }
        }
    
        fetch('data/create_score.php', {
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
                showGameOverScreen(score);
            } else {
                console.error('Error submitting score:', data.message);
                showGameOverScreen(score, true);
            }
        })
        .catch((error) => {
            console.error('Error:', error);
            showGameOverScreen(score, true);
        });
    }
    
    function showGameOverScreen(score, error = false) {
        document.getElementById('gameWindow').style.display = 'none';
        document.getElementById('gameOverOverlay').style.display = 'block';
    
        let content = `
            <div class="display-container">
                <h2>Game Over</h2>
                <p><strong>Score:</strong> ${score}</p>
        `;
    
        if (error) {
            content += `
                <p>There was an error submitting your score. Would you like to try again?</p>
                <button id="retrySubmitButton">Submit Score</button>
            `;
        } else {
            content += `
                <p><strong>Username:</strong> ${username}</p>
                <p><strong>Time Played:</strong> ${new Date().toLocaleTimeString()}</p>
            `;
        }
    
        content += `
                <button id="playAgainButton">Play Again</button>
                <button class="leaderboard">View Highscores</button>
                <button id="returnToStartButton">Return to Start</button>
            </div>
        `;
    
        document.getElementById('gameOverOverlay').innerHTML = content;
        
        document.getElementById('playAgainButton').addEventListener('click', startGame);
        document.getElementById('returnToStartButton').addEventListener('click', returnToStart);
        
        if (error) {
            document.getElementById('retrySubmitButton').addEventListener('click', () => createScore("JayRunner", score));
        }
    
        let leaderboard = document.getElementsByClassName('leaderboard');
        for (let i = 0; i < leaderboard.length; i++) {
            leaderboard[i].addEventListener('click', HSDisplay);
        }
    }
    
    function returnToStart() {
        document.getElementById('gameOverOverlay').style.display = 'none';
        document.getElementById('startScreen').style.display = 'block';
    }

    function startGame() {
        document.getElementById('startScreen').style.display = 'none';
        document.getElementById('gameOverOverlay').style.display = 'none';
        var gameWindow = document.getElementById('gameWindow');
        gameWindow.style.display = 'block';
        gameWindow.innerHTML = ''; // Clear previous game

        var iframe = document.createElement('iframe');
        iframe.src = "jayrunner_exports/jayrunner.html";
        iframe.style.width = "100%";
        iframe.style.height = "100%";
        iframe.style.border = "none";
        iframe.style.flexGrow = "1";
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
    
        // Fetch high scores
        fetch('data/read_score.php')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    let highscoresTable = `
                        <div class="display-container">
                            <h1>Highscores</h1>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Name</th>
                                        <th>Score</th>
                                        <th>Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                    `;
                    data.scores.forEach((score, index) => {
                        highscoresTable += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${score.username}</td>
                                <td>${score.score}</td>
                                <td>${score.timePlayed}</td>
                            </tr>
                        `;
                    });
                    highscoresTable += `
                                </tbody>
                            </table>
                            <button id="returnButton">Return To Start</button>
                        </div>
                    `;
    
                    document.getElementById('HSOverlay').innerHTML = highscoresTable;
                    document.getElementById('returnButton').addEventListener('click', () => {
                        document.getElementById('HSOverlay').style.display = 'none';
                        document.getElementById('startScreen').style.display = 'block';
                    });
                } else {
                    console.error('Error fetching high scores:', data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });    
    }
    
    let leaderboard = document.getElementsByClassName('leaderboard')
    for (let i = 0; i < leaderboard.length; i++) {
        leaderboard[i].addEventListener('click', HSDisplay);
    }
})();
