import { insertScore } from '/gamers/web_src/games/high_scores_functions.js';

document.addEventListener('DOMContentLoaded', function () {
    const bird = document.getElementById('bird');
    const pipeTop1 = document.getElementById('pipeTop1');
    const pipeBottom1 = document.getElementById('pipeBottom1');
    const pipeTop2 = document.getElementById('pipeTop2');
    const pipeBottom2 = document.getElementById('pipeBottom2');

    let birdBottom = 250;
    let gravity = 2;
    let isGameOver = false;
    let score = 0;

    // Added a scoring feature to the game
    // TODO: Connect this data to the database for a leaderboard
    const scoreContainer = document.getElementById('score-container');
    const scoreText = document.getElementById('score-text');

    // This function moves the bird image 50 pixels up at the click of the up arrow
    function jump() {
        if (birdBottom < 500) {
            birdBottom += 50;
            bird.style.bottom = birdBottom + 'px';
        }
    }
    // This function resets the position so they appear closer or further away when the regenerate
    function resetPipePosition(pipeTop, pipeBottom) {
        pipeTop.style.left = '400px';
        pipeBottom.style.left = '400px';

        const randomHeight = Math.floor(Math.random() * 200) + 100;
        pipeTop.style.height = randomHeight + 'px';
        pipeBottom.style.height = (600 - randomHeight - 150) + 'px';
    }
    // This function checks if the bird is colliding with the pipe
    function isColliding(element1, element2) {
        const rect1 = element1.getBoundingClientRect();
        const rect2 = element2.getBoundingClientRect();

        return (
            rect1.top < rect2.bottom &&
            rect1.bottom > rect2.top &&
            rect1.left < rect2.right &&
            rect1.right > rect2.left
        );
    }

    function updateScore() {
        score++;
        scoreText.innerText = 'Score: ' + score;
    }

    function gameLoop() {
        if (!isGameOver) {
            birdBottom -= gravity;
            bird.style.bottom = birdBottom + 'px';

            // This checks for if the bird collides with any part of a pipe
            if (
                isColliding(bird, pipeTop1) ||
                isColliding(bird, pipeBottom1) ||
                isColliding(bird, pipeTop2) ||
                isColliding(bird, pipeBottom2)
            ) {
                alert('Game over! You scored '+ score + ' points');
                isGameOver = true;
            }

            // Move the pipes, also controls the speed at which the game is played
            pipeTop1.style.left = pipeTop1.offsetLeft - 2 + 'px';
            pipeBottom1.style.left = pipeBottom1.offsetLeft - 2 + 'px';

            pipeTop2.style.left = pipeTop2.offsetLeft - 2 + 'px';
            pipeBottom2.style.left = pipeBottom2.offsetLeft - 2 + 'px';

            // This regenerates the pipes when the go off screen
            if (pipeTop1.offsetLeft + pipeTop1.clientWidth < 0) {
                resetPipePosition(pipeTop1, pipeBottom1);
                updateScore();
            }

            if (pipeTop2.offsetLeft + pipeTop2.clientWidth < 0) {
                resetPipePosition(pipeTop2, pipeBottom2);
                updateScore();
            }

            requestAnimationFrame(gameLoop);
        }
    }

    document.addEventListener('keydown', jump);
    gameLoop();
    insertScore(999, "flappy_bird", score, Date.now(), "FlappyTestName")
});
