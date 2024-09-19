//Starting the intial Canvas
const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");
const canvasWidth = canvas.width;
const canvasHeight = canvas.height;
//Making our birds and setting them to be invisible
let jay_1_x = 75;
let jay_1_y = 100;
let jay_2_x = 100;
let jay_2_y = 100;
let jay_1_see = 0;
let jay_2_see = 0;
let mouse_x = 0;
let mouse_y = 0;
let radius = 50;
let round = 0;
let  directionx1 = 1;
let  directiony1 = 1;
let  directionx2 = 1;
let  directiony2 = 1;
let score = 0;
let FPS = 60;
let round0ver = false;

function net(e){
    const rect = canvas.getBoundingClientRect();
    mouse_x = e.clientX- rect.left;
    mouse_y = e.clientY - rect.top;


}

function drawScoreboard(){
    context.fillStyle = "white"
    var scoreString = "Round: "+round+" Score: "+score;
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
}

function roundover(){
    if(jay_1_see==1&&jay_2_see==1){
        round0ver=true;
        roundstart();
    }


}

function fly(){
    if(jay_1_see==0){
    context.fillStyle = "blue";
    context.beginPath();
    context.arc(jay_1_x,jay_1_y,radius,0,2*Math.PI);
    context.closePath();
    context.fill();}
    if(jay_2_see==0){
        context.fillStyle = "blue";
        context.beginPath();
        context.arc(jay_2_x,jay_2_y,radius,0,2*Math.PI);
        context.closePath();
        context.fill();        
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
    jay_1_x = jay_1_x+2*directionx1;
    jay_1_y = jay_1_y+.5*directiony1;
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
    jay_2_x = jay_2_x+.5*directionx2;
    jay_2_y = jay_2_y+2*directiony2;

}

function gameover(){


}

function isDuckInCircle(x, y, xCenter, yCenter, radius1) {
    console.log("check");
    let distance = Math.sqrt((x - xCenter) ** 2 + (y - yCenter) ** 2);
    return distance <= radius1;
}




function capture(){
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
    document.addEventListener('keydown', capture);
    
    fly();
    flybad();
    drawScoreboard();
    roundover();
    


}


window.setInterval(animate,1000/FPS);