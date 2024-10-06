import { resources } from './resources.js';
import { Sprite } from './sprite.js';
import { Vector2 } from './Vector2.js';
import { GameLoop } from './GameLoop.js';
import { Input, LEFT, RIGHT, UP, DOWN } from './input.js';

// Canvas and context
const canvas = document.querySelector("#game-canvas");
const ctx = canvas.getContext('2d');
const gameTitle = "Carrot Cake Collection";
let score = 0;

// Player settings
const characterPos = new Vector2(canvas.width/2, canvas.height/2); // Initial Position centered in canvas

const input = new Input();
const update = () => {
    if (input.direction === DOWN) {
        characterPos.y += 1;
    }
    if (input.direction === UP) {
        characterPos.y -= 1;
    }
    if (input.direction === LEFT) {
        characterPos.x -= 1;
    }
    if (input.direction === RIGHT) {
        characterPos.x += 1;
    }
};

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

// Function to draw the scoreboard
function drawScoreboard() {
    // Set font and color for the scoreboard
    ctx.font = '12px Courier New';
    ctx.fillStyle = 'white';
    ctx.textAlign = 'left'; // Align text to the left
    ctx.textBaseline = 'top'; // Align text to the top
    ctx.fillText('Score: ' + score, 4, 4);
}

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

    drawScoreboard();
}

// Starts the drawing
const gameLoop = new GameLoop(update, draw);
gameLoop.start();


// function animateCupcake() {
//     const canvas = document.getElementById("canvas");
//     const context = canvas.getContext("2d");
//     const spriteSheet = new Image();
//     spriteSheet.src = "cupcake.png";

//     const spriteWidth = 16;
//     const spriteHeight = 16;
//     const spritesPerRow = 3; // There are 3 sprites per row
//     const totalSprites = 7; // Total of 7 sprites in the sheet

//     let currentFrame = 0;

//     function drawFrame() {
//         // Calculate the x and y position of the current sprite in the sheet
//         const column = currentFrame % spritesPerRow;
//         const row = Math.floor(currentFrame / spritesPerRow);

//         context.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas before drawing

//         // Draw the current frame
//         context.drawImage(
//             spriteSheet, 
//             column * spriteWidth,   // Source x in the sprite sheet
//             row * spriteHeight,     // Source y in the sprite sheet
//             spriteWidth, spriteHeight, // Width and height of the sprite
//             0, 0,                  // Destination on the canvas
//             spriteWidth, spriteHeight // Draw at original size
//         );

//         // Move to the next frame
//         currentFrame = (currentFrame + 1) % totalSprites;

//         // Loop animation
//         setTimeout(drawFrame, 100); // Adjust the delay to control speed
//     }

//     spriteSheet.onload = function() {
//         drawFrame(); // Start the animation once the image is loaded
//     };
// }

// // Call the function to start the animation
// animateCupcake();


function detectCollision(){
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