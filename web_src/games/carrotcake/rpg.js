import { resources } from './resources.js';

// Canvas and context
const canvas = document.querySelector("#game-canvas");
const ctx = canvas.getContext('2d');

// Get background
const backgroundImage = new Image();
backgroundImage.src = 'sprites/betamap.jpg';

// Player settings
const playerSize = 32;
let playerX = 400;
let playerY = 400;

// Creates the game area
function draw() {
    // Clears the canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Scrolls screen
    const offsetX = playerX - canvas.width / 2 + playerSize / 2;
    const offsetY = playerY - canvas.height / 2 + playerSize / 2;

    // Draws the background image
    const background = resources.images.map;
    if (background.isLoaded) {
        ctx.drawImage(background.image, 0, 0, 1650, 1019);
    }
    
    // Draws the player
    ctx.fillStyle = 'red'; // Player color
    ctx.fillRect(playerX - playerSize / 2, playerY - playerSize / 2, playerSize, playerSize);
}

// Starts the drawing
setInterval(() => {
    draw();
}, 300)

function animate(){
    //add  selection through character spritesheet for animation
}

function detectCOllision(){
    //add collision to the map
}

function reportScore() {
    // TODO: report username, game, score, maybe time? to database
    let gameStats = {
        username: username,
        gameName: gameName,
        score: score,
        // time: gameTime // maybe implemented depending on database capabilities
    };


    fetch('PLACEHOLDER.php', { // TODO: Update with the create.php file associated with highscores 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(gameStats),
    })
    .then((response) => response.json())
    .then((json) => console.log(json));
}