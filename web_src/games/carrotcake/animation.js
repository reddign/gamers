export class Sprite{
    constructor(
        resourse, //the image we want to draw
        frameSize, // size of the crop of the image
        frameWidth, // how the sprite is arranged horizontally
        frameHeight, //how the sprite is arranged vertically
        total, // which frame we want to show
        scale, //how large to draw the image
        position, //where to draw it (top left)

    ){
        this.resource = resource;
    }
}

export class GameLoop{
    constructor(update, render){
        this.lastFrameTime = 0;
        this.accumulatedTime = 0;
        this.timeStep = 1000/60; //60 frames per second

        this.update = update;
        this.render = render;

        this.rafID = null;
        this.isRunning = false;
    }
}

mainLoop = (timestamp) => {
    if(!this.isRunning) return;
    let deltaTime = timestamp - this.lastFrameTime;
    this.lastFrameTime = timestamp;

    //accumulating all the time since the last frame.
    this.accumulateTime += deltaTime;

    //if there's enough accumulated time to run one or more fixed updates
    while(this.accumulateTime >= this.timeStep){
        this.update(this.timestamp); //we pass the fixed time step here
        this.accumulateTime -= this.timeStep;
    }

    this.render();
    this.rafID = requestAnimationFrame(this.mainLoop);
}

export const LEFT =  "LEFT";
export const RIGHT = "RIGHT";
export const UP = "UP";
export const DOWN = "DOWN";

export class Input{
    constructor(){
        this.heldDirectons = [];
        document.addEventListener("keydown", (e) =>{
            //check for dedicated direction list
            if(e.code == "ArrowUp" || e.code === "KeyW"){
                this.onArrowPressed(UP);
            }
            if(e.code == "ArrowDown" || e.code === "KeyS"){
                this.onArrowPressed(DOWN);
            }
            if(e.code == "ArrowLeft" || e.code === "KeyA"){
                this.onArrowPressed(LEFT); 
            }
            if(e.code == "ArrowRight" || e.code === "KeyD"){
                this.onArrowPressed(RIGHT);
            }
        })
        document.addEventListener("keyup", (e) =>{
            //check for dedicated direction list
            if(e.code == "ArrowUp" || e.code === "KeyW"){
                this.onArrowReleased(UP);
            }
            if(e.code == "ArrowDown" || e.code === "KeyS"){
                this.onArrowReleased(DOWN);
            }
            if(e.code == "ArrowLeft" || e.code === "KeyA"){
                this.onArrowReleased(LEFT); 
            }
            if(e.code == "ArrowRight" || e.code === "KeyD"){
                this.onArrowReleased(RIGHT);
            }
        })
        input.direction
    }
    get direction(){
        return this.heldDirections[0]; //undefined
    }
    onArrowPressed(direction){
       //add this arrow to the queue if it's new
        if(this.heldDirections.indexOf(direction)== -1){
            this.heldDirections.unshift(direction);
        }
    }
    onArrowReleased(direction){
        const index = this.heldDirections.indexOf(direction);
        if(index == -1){
            return;
        }
        //removing this key from the list.
        this.heldDirectons.splice(index,1);
    }
}
function start(){
    if(!this.isRunning){
        this.isRunning = true;
        this.rafId = requestAnimationFrame(this.mainloop);
    }
}

function stop(){
    if(this.rafId){
        cancelAnimationFrame(this.rafId);
    }
    this.isRunning = false;
}













//this is for all the animation
 
//loading the student image
const student = new Image();
student.src = 'gamers/web_src/games/carrotcake/sprites/student.png';
const canvas = document.getElementById('gamers/web_src/games/carrotcake/sprites/betamap.png');
const ctx = canvas.getContext('2d');

// const makeStandingFrames =(rootFrame = 0) => {
//     return{
//         duration: 400,
//         frames: {
//             {
//                 time: 0,
//                 frame: startingFrame,
//             }
//         }
//     }
// }
// const makeWalkingFrames =(rootFrame = 0) => {
//     return{
//         duration: 400,
//         frame: {
//             time: 0,
//             frame: rootFrame + 1
//         },
//         {
//             time: 100,
//             frame: rootFrame
//         },
//         {
//             time: 200,
//             frame: rootFrame +1
//         },
//         {
//             time: 300,
//             frame: rootFrame+2
//         }
//     }
// }



export const walkDown = makeWalkingFrames(0);
export const walkRight = makeWalkingFrames(3);
export const walkUp = makeWalkingFrames(6);
export const walkLeft = makeWalkingFrames(9);

export const standDown = makeStandingFrame(1);
export const standRight= makeStandingFrame(4);
export const standUp = makeStandingFrame(7);
export const standLeft = makeStandingFrame(10);




//variables
let studentX = 0; //X position of the student
let studentY = canvas.height - 100; //Y position of the student
let frame = 0; //framing for the animation
let frameWidth = 64;
let frameHeight = 64;
let total = 4; //this is total amount of frames.

function update(){
    //update student's X position to move right
    studentX += 2;
    if (studentX > canvas.width){
        studentX = -frameWidth; //looping back to the left side.
    }
    //updating the current frame to simulate the walking
    frame = (frame + 1) % totalFrames;
}

//function draw() will draw the current frame of the student sprite
function draw(){
        ctx.clearRect(0,0,canvas.width, canvas.height);    

        ctx.drawImage(
        student,
        frame * frameWidth, 0, //this is source x and y for which frame to pick up from the sprite
        frameWidth, frameHeight, //this is the source of the width and height
        studentX, studentY, //this is destination x and y
        frameWidth, frameHeight // this is the destination width and height.
    );
}

function loop(){
    update();
    draw();
    requestAnimationFrame(loop);
}

//This is to start the loop when the image is loaded
student.onload = function(){
    loop();
}