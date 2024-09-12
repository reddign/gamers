//Starting the intial Canvas
const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");

//Making our birds and setting them to be invisible
let jay_1_x = 0;
let jay_1_y = 0;
let jay_2_x = 0;
let jay_2_y = 0;
let jay_1_see = 0;
let jay_2_see = 0;
let mouse_x = 0;
let mouse_y = 0;
let radius = 10;
let round = 0;
let  directionx1 = 1;
let  directiony1 = 1;
let  directionx2 = 1;
let  directiony2 = 1;

function roundstart(){


}

function roundover(){



}

function fly(){
    if(jay_1_see){
    context.fillStyle = "blue";
    context.beginPath();
    context.arc(jay_1_x,jay_1_y,radius,0,2*Math.PI);
    context.closePath();
    context.fill();}
    if(jay_2_see){
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
    jay_1_y = jay_1_y+2*directiony1;
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
    jay_2_x = jay_2_x+2*directionx1;
    jay_2_y = jay_2_y+2*directiony1;

}

function gameover(){


}


function net(e){

}





function animate(){
    mouse_x = e.clientX;
    mouse_y = e.clientY;

}


window.setInterval(animate,1000/FPS);