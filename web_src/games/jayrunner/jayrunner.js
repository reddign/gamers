const canvas = document.getElementById("gameCanvas");
const context = canvas.getContext("2d");

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// load images for player
const playerWalkImg = new Image();
playerWalkImg.src = 'images/bluejaywalk.png';
const playerJumpImg = new Image();
playerJumpImg.src = 'images/bluejayjump.png';


// create a player object so its easier variable organization
const player = {
    x: 50,
    y: canvas.height - 150,
    width: 50,
    height: 50,
    dy: 0,  // change in, can use player.dy to calculate change in y to update playter img
    gravity: 0.5,
    grounded: false,
    currentImg: playerWalkImg
};

let gravity = 50;
let playerpos = 0;
let grounded = true;
let vspeed = 0;
let FPS = 0;
let isGameOver = false;

// Draw the player on the canvas using image
function drawPlayer() {
    context.drawImage(player.currentImg, player.x, player.y, player.width, player.height);
}

function updatePlayer() {
    //TODO Update player logic and images here
}

function drawObstacles() {
    // generate and draw the different obstacles. can use generated sprites later
}

function updateObstacles() {
    // TODO: Update Obstacle positioon and logic
}

function checkCollision() {
    //  TODO: CHeck PLayer Collision with obstacle
}

function drawScore() {
    // TODO: Draw Score
}

function jump() {
    if (grounded == true) {
        vspeed = 500;
    }
}


function gameOver() {
    // TODO: add gameover logic
}

function gameLoop() {
    if (!isGameOver) {

        updatePlayer();
        checkCollision();

        drawPlayer();
        drawObstacles();
        drawScore();
    }
}

// Start the game when images are loaded
let imagesLoaded = 0;
function imageLoaded() {
    imagesLoaded++;
    // only bird images right now so value is 2, obstacles later
    if (imagesLoaded === 2) {
        gameLoop();
    }
}

// load images
playerWalkImg.onload = imageLoaded;
playerJumpImg.onload = imageLoaded;

document.addEventListener('keydown', jump());
