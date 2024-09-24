//Starting the intial Canvas
const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");
const canvasWidth = canvas.width;
const canvasHeight = canvas.height;

const birdImage = new Image();
birdImage.src = 'bluejaygif.gif'; 

let birdWidth = 100;  // 
let birdHeight = 100;

//Making our birds and setting them to be invisible
let jay_1_x = 75;
let jay_1_y = 100;
let jay_2_x = 100;
let jay_2_y = 100;
let jay_1_see = 1;
let jay_2_see = 1;
let mouse_x = 0;
let mouse_y = 0;
let radius = 50;
let round = 1;
let  directionx1 = 1;
let  directiony1 = 1;
let  directionx2 = 1;
let  directiony2 = 1;
let score = 0;
let FPS = 60;
let round0ver = false;
let time=0;
let gameOver = false;
function net(e){
    const rect = canvas.getBoundingClientRect();
    mouse_x = e.clientX- rect.left;
    mouse_y = e.clientY - rect.top;


}

function drawScoreboard(){
    context.fillStyle = "white"
    var scoreString = "Round: "+round+" Score: "+score+" Time:"+time;
    context.fillText(scoreString,20,500);
}

function roundstart(){
    jay_1_see = 0;
    jay_2_see = 0;
    jay_1_x = Math.random() * canvasWidth;
    jay_1_y = Math.random() * canvasHeight;
    jay_2_x = Math.random() * canvasWidth;
    jay_2_y = Math.random() * canvasHeight;
    round++;
    round0ver=false;
}

function roundover(){
    if(jay_1_see==1&&jay_2_see==1&&!gameOver){
        context.fillStyle = "white"
        var startString = "Round: "+round+ " Start Click to begin!";
        context.fillText(startString,20,300);
        round0ver=true;
        time=0;
        roundover()
    }
    if(time==250){
        gameover();
    }

}

function fly() {
    if (jay_1_see == 0) {
        context.drawImage(birdImage, jay_1_x - birdWidth / 2, jay_1_y - birdHeight / 2, birdWidth, birdHeight);
    }
    if (jay_2_see == 0) {
        context.drawImage(birdImage, jay_2_x - birdWidth / 2, jay_2_y - birdHeight / 2, birdWidth, birdHeight);
    }
}


function flybad(){

   
    if(jay_1_x+radius>canvas.width){
        directionx1 = -1;
    }
    if(jay_1_y+radius>canvas.height){
        directiony1 = -1;
    }
    if(jay_1_x < 0+radius){
        directionx1 = 1;
    }
    if(jay_1_y < 0+radius){
        directiony1 = 1;
    }
    jay_1_x = jay_1_x+2*directionx1*1.02*round;
    jay_1_y = jay_1_y+.5*directiony1*1.02*round;
    if(jay_2_x+radius>canvas.width){
        directionx2 = -1;
    }
    if(jay_2_y+radius>canvas.height){
        directiony2 = -1;
    }
    if(jay_2_x < 0+radius){
        directionx2 = 1;
    }
    if(jay_2_y < 0+radius){
        directiony2 = 1;
    }
    jay_2_x = jay_2_x+.5*directionx2*1.02*round;
    jay_2_y = jay_2_y+2*directiony2*1.02*round;

}

function gameover(){
    gameOver=true;
    jay_1_see=1;
    jay_2_see=1;
    context.fillStyle = "white"
    var loseString = "You Lose!";
    context.fillText(loseString,20,450);
    gameover();


}

function isDuckInCircle(x, y, xCenter, yCenter, radius1) {
    console.log("check");
    let distance = Math.sqrt((x - xCenter) ** 2 + (y - yCenter) ** 2);
    return distance <= radius1;
}




function capture(){
    if(round0ver){
        roundstart();
    }
    if(gameOver){
        gameOver=false;
        round=0;
        time=0;
        score=0;
    }
    console.log(mouse_x,mouse_y,jay_1_x,jay_1_y,jay_2_x,jay_2_y);
    if(isDuckInCircle(mouse_x,mouse_y,jay_1_x,jay_1_y,radius)){
        console.log("hit");
        score += 25;
        jay_1_see=1;
    }

    if(isDuckInCircle(mouse_x,mouse_y,jay_2_x,jay_2_y,radius)){
        console.log("hit");

        score += 25;
        jay_2_see=1;
    }

}


function clear(){

    context.fillStyle = "black";
    context.fillRect(0,0,canvas.width,canvas.height);
}


function animate(){
    clear();
    document.addEventListener('click', capture);
    
    fly();
    flybad();
    drawScoreboard();
    roundover();
    time++;


}



window.setInterval(animate,1000/FPS);