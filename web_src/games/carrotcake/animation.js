//this is for all the animation
 
//loading the student image
const student = new Image();
student.src = 'student.png';

const canvas = document.getElementById('betamap.png');

//variables
let studentX = 0; //X position of the student
let studentY = canvas.height - 100; //Y position of the student
let frame = 0; //framing for the animation
let frameWidth = 64;
let frameHeight = 64;
let total = 4;

function update(){
    //update student's X position to move right
    studentX += 2;
    if (studentX > canvas.width){
        studentX -= frameWidth; //looping back to the left side.
    }
    //updating the current frame to simulate the walking
    frame = (frame + 1) % totalFrames;
}