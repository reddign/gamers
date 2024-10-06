/*
    File Title: animation.js
    Description: Controls sprite animation
    
    Status: Unfinished
*/

// // export class Student{
// //     constructor(resource, frameSize, frameWidth, frameHeight, total, scale, position){
// //         this.resource = resource;
// //         this.frameSize = frameSize;
// //         this.frameWidth = frameWidth;
// //         this.frameHeight = frameHeight;
// //         this.total = total;
// //         this.scale = scale;
// //         this.position = position;
// //     }
// // }

// export class GameLoop{
//     constructor(update,render){
//         this.lastFrameTime = 0;
//         this.accumulatedTime = 0;
//         this.timeStep = 1000/60; //60 frames a second

//         this.update = update;
//         this.render = render;

//         this.rafID = null;
//         this.isRunning = false;

//         this.mainLoop = this.mainLoop.bind(this);
//     }
//     mainLoop(timestamp){
//         if(!this.isRunning) return;
//         let deltaTime = timestampe - this.lastFrameTime;
//         this.lastFrameTime = timestamp;

//         this.accumulateTime += deltaTime;

//         while(this.accumulateTime >= this.timeStep) {
//             this.update(this.timeStep); //pass the fixed time step here
//             this.accumulatedTime -= this.timeStep;
//         }
//         this.render();
//         this.rafID = requestAnimationFrame(this.mainLoop);
//     }
//     start(){
//         if(!this.isRunning){
//             this.isRunning = true;
//             this.rafID = requestAnimationFrame(this.mainLoop);
//         }
//     }

//     stop(){
//         if(this.rafID){
//             cancelAnimationFrame(this.rafID);
//         }
//         this.isRunning = false;
//     }
// }

// export const LEFT = "LEFT";
// export const RIGHT = "RIGHT";
// export const UP = "UP";
// export const DOWN = "DOWN";

// export class Input{
//     constructor(){
//         this.heldDirections = [];

//         document.addEventListener("keydown",(e) => {
//             if(e.code === "ArrowUp" || e.code == "KeyW"){
//                 this.onArrowPressed(UP);
//             }
//             if(e.code === "ArrowDown" || e.code == "KeyS"){
//                 this.onArrowPressed(DOWN);
//             }
//             if(e.code === "ArrowLeft" || e.code == "KeyA"){
//                 this.onArrowPressed(LEFT);
//             }
//             if(e.code === "ArrowRight" || e.code == "KeyD"){
//                 this.onArrowPressed(RIGHT);
//             }
//         });

if(e.code == "ArrowUp"|| e.code == "KeyW"){
    this.onArrowPressed(UP);
}   
if(e.code == "ArrowDown" || e.code == "KeyS"){
    this.onArrowPressed(DOWN);
}  
if(e.code == "ArrowLeft" || e.code == "KeyA"){
    this.onArrowPressed(LEFT);
}       





           
            if(e.code === "ArrowLeft" || e.code === "KeyA"){
                this.onArrowReleased(LEFT);
            }
            if(e.code === "ArrowRight" || e.code === "KeyD"){
                this.onArrowReleased(RIGHT);
            }

    get direction(){
        return this.heldDirections[0]; //this gets the first held direction or this is undefined.
    }

    onArrowPressed(direction){
        if(this.heldDirections.indexOf(direction) === -1){
            this.heldDirections.unshift(directions);
        }
    }

//     onArrowReleased(direction) {
//         const index = this.heldDirections.indexOf(direction);
//         if(index !== -1){
//             this.heldDirections.splice(index,1);
//         }
//     }
// }
    function onArrowReleased(direction) {
        const index = this.heldDirections.indexOf(direction);
        if(index !== -1){
            this.heldDirections.splice(index,1);
        }
    }

// //this part is the animation frames

// const makeStandingFrame = (startingFrame = 0) => ({
//     duration: 400, 
//     frames: [
//         {time: 0, frame: startingFrame }
//     ]
// });

// const makeWalkingFrames = (startingFrame = 0) =>({
//     duration: 400,
//     frames: [
//         {time: 0, frame: startingFrame +1},
//         {time: 100, frame: startingFrame},
//         {time: 200, frame: startingFrame + 1},
//         {time: 300, frame: startingFrame + 2}
//     ]
// });

// export const walkDown = makeWalkingFrames(0);
// export const walkRight = makeWalkingFrames(3);
// export const walkUp = makeWalkingFrames(6);
// export const walkLeft = makeWalkingFrame(9);

// export const standDown = makeStandingFrame(1);
// export const standRight = makeStandingFrame(4);
// export const standUp = makeStandingFrame(7);
// export const standLeft = makeStandingFrame(10);

// //Variables:
// const input = new Input();
// let lastDirection = DOWN;
// let studentX = 0;
// let studentY = canvas.height - 100;
// let frame = 0;
// let frameWidth = 64;
// let frameHeight = 64;
// let total = 4; //this is for the total amount of frames.

// //big ol update function
// function update(){
//     const direction = input.direction;
//     if(direction === DOWN){
//         studentY +=2;
//         frame = (frame +1) % walkDown.frames.length;
//     } else if (direction === UP){
//         studentY -= 2;
//         frame = (frame + 1) % walkUp.frames.length;
//     } else if (direction === LEFT){
//         studentX -= 2;
//         frame = (frame + 1) % walkLeft.frames.length;
//     } else {
//         if(lastDirection === DOWN){
//             frame = standDown.frames[0].frame;
//         } else if (lastDirection === UP){
//             frame = standUp.frames[0].frame;
//         } else if(lastDirection === LEFT){
//             frame = standLeft.frames[0].frame;
//         } else if (lastDirection === RIGHT){
//             frame = standRight.frames[0].frame;
//         }
//     }
//     if(studentX > canvas.width){
//         studentX = -frameWidth;
//     }
//     lastDirection = direction || lastDirection;
// }
// function draw() {
//     ctx.clearRect(0,0,canvas.width, canvas.height);

//     ctx.drawImage(
//         student,
//         frame  * frameWidth, 0, //this is source x and y for current frame
//         frameWidth, frameHeight,
//         studentX, studentY,
//         frameWidth, frameHeight
//     );
// }

// function loop(){
//     update();
//     draw();
//     requestAnimationFrame(loop);
// }

// student.onload = function (){
//     loop();
// }