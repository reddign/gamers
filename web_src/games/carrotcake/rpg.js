import { resources } from './resources.js';
import { Sprite } from './sprite.js';
import { Vector2 } from './Vector2.js';
import { GameLoop } from './animation.js';

// Canvas and context
const canvas = document.querySelector("#game-canvas");
const ctx = canvas.getContext('2d');
const gameTitle = "Carrot Cake Collection";
let score = 0;

// Player settings
const characterPos = new Vector2(canvas.width/2, canvas.height/2); // Initial Position centered in canvas
// const playerSize = 32;
// let playerX = 400;
// let playerY = 400;

const update = () => {
 // TODO: updating assets in game
};

const gameLoop = new GameLoop(update, draw);
gameLoop.start();

// Sprites
const backgroundSprite = new Sprite({
    resource: resources.images.map,
    frameSize: new Vector2(1650, 1019)
})

const characterSprite = new Sprite({
    resource: resources.images.student,
    frameSize: new Vector2(16, 16),
    hFrames: 10,
    vFrames: 1,
    frame: 1
})

// Creates the game area
function draw() {
    // Clears the canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Scrolls screen
    // const offsetX = playerX - canvas.width / 2 + playerSize / 2;
    // const offsetY = playerY - canvas.height / 2 + playerSize / 2;

    // Draw sprites
    backgroundSprite.drawImage(ctx, 0, 0);
    characterSprite.drawImage(ctx, characterPos.x, characterPos.y);
    // Potential TODO: create a hero offset that puts the hero into a specific square in the grid
    // ^Assumes we are doing grid snapping
}

// Starts the drawing
setInterval(() => {
    draw();
}, 300)

const hero = new Sprite({
    resource: resources.images.student,
    hFrames: 10,
    vFrames: 1,
    frame: 1
})

function animate(){
    //add  selection through character spritesheet for animation
}

function detectCOllision(){
    //add collision to the map
}

function reportScore() {
    // TODO: report username, game, score, maybe time? to database
    let gameStats = {
        user_id: user_id,
        game_played: gameTitle,
        score: score,
        time_played: date,
        username: username
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