"use strict"

window.addEventListener('load',init);
let buttonPressed=null;
let wordBank=[];
let buttons2D=[];

function init(){
    let letterButtons=document.getElementsByClassName("letterButton");
    let rows= document.getElementsByClassName("row");
    for(let i=0;i<rows.length;i++){
        buttons2D[i] =rows[i].getElementsByClassName("letterButton");
    }
    //console.log(buttons2D);

    for(let i=0;i<letterButtons.length;i++){
        letterButtons[i].addEventListener('click',pressButton);
        letterButtons[i].addEventListener("dblclick",removePress);
    }
    let bankObj=document.getElementsByClassName("wordBank");
    for(let i=0;i<bankObj.length;i++){
        wordBank[i]=bankObj[i].innerText;
    }
}

function pressButton(){
    
    if(buttonPressed==null | buttonPressed==this){
        this.classList.add("activeButton");
        buttonPressed=this;
    }
    else{
        if(this.value==buttonPressed.value & wordBank.includes(this.value)){
            document.getElementById(this.value).classList.add("found");
            updateScore();
            document.getElementById("score").innerHTML=totalScore;
            let startButton;
            let endButton;
            console.log(this.getAttribute("angle"));
            if(this.getAttribute("angle")==""){
                endButton=this;
                startButton=buttonPressed;
            }
            else{
                endButton=buttonPressed;
                startButton=this;
            }
                
            let posX=parseInt(startButton.getAttribute("posX"));
            let posY=parseInt(startButton.getAttribute("posY"));
            let xmod;
            let ymod;
            switch(parseInt(startButton.getAttribute("angle"))) {
                case 0:
                    xmod = 1;
                    ymod = 0;
                    break;
                case 1:
                    xmod = 1;
                    ymod = -1;
                    break;
                case 2:
                    xmod = 0;
                    ymod = -1;
                    break;
                case 3:
                    xmod = -1;
                    ymod = -1;
                    break;
                case 4:
                    xmod = -1;
                    ymod = 0;
                    break;
                case 5:
                    xmod = -1;
                    ymod = 1;
                    break;
                case 6:
                    xmod = 0;
                    ymod = 1;
                    break;
                case 7:
                    xmod = 1;
                    ymod = 1;
                    break;
            }
            let i=0;
            while(startButton!=endButton){
                startButton=buttons2D[posX+(i*ymod)][posY+(i*xmod)];
                startButton.classList.add("foundWord");
                i++;
            }
            
        }
        
        buttonPressed.classList.remove("activeButton");
        buttonPressed=null;
        let win=1;
            for(let i=0;i<wordBank.length;i++){
                let wBank=document.getElementsByClassName("wordBank");
                if(!(wBank[i].classList.contains("found"))){
                    win=0
                }
            }
            if(win){
                for(let i=0;i<buttons2D.length;i++){
                    for(let j=0;j<buttons2D[i].length;j++){
                        buttons2D[i][j].removeEventListener('click',pressButton);
                        buttons2D[i][j].removeEventListener("dblclick",removePress);
                    }
                }
                document.getElementById("title").innerHTML="You Win";
                document.getElementById('timer').value="stop";
                rainbowBoard();
            }
    }

}

function removePress(){
    if(this.classList.contains("activeButton")){
        this.classList.remove("activeButton");
        buttonPressed=null;
    }
}

async function rainbowBoard(){
    let timeMilis=1;
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("red");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("orange");
            buttons2D[i][j].classList.remove("red");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("yellow");
            buttons2D[i][j].classList.remove("orange");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("yellowgreen");
            buttons2D[i][j].classList.remove("yellow");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("green");
            buttons2D[i][j].classList.remove("yellowgreen");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("teal");
            buttons2D[i][j].classList.remove("green");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("blue");
            buttons2D[i][j].classList.remove("teal");
        }
    }
    for(let i=0;i<buttons2D.length;i++){
        for(let j=0;j<buttons2D[i].length;j++){
            const delay = ms => new Promise(res => setTimeout(res, ms));
            await delay(timeMilis);
            buttons2D[i][j].classList.add("foundWord");
            buttons2D[i][j].classList.remove("blue");
        }
    }
}











/*
 * Creation Date: 9/15/24
 * Author: Wes J. Ryan
 * Last Edited: 10/2/24 (12:48 am (Commenting out and rewriting header))
 * Last Edited by: Wes J. Ryan
 *
 * Program Summary:
 * The first three functions help constitute the function to be called whenever a word is found, so as to update the player's score.
 * To do this we must get the current time from the timer with callTimer(), then use that information to set both the base score for
 * finding the word with wordScore() and the multiplier that will be applied with setMulti(). Lastly, when called, the program will
 * add to the player's score, and update its record of time, to allow the next word found to be scored accurately.
 * CALL ONLY updateScore() in the game logic!!!
 */

function callTimer() {
    let timeGrab = document.getElementById("timer").innerHTML; // Gets timer element from page
    let timeArr = timeGrab.split(":"); // Splits string at the colon into an array
    let mins = parseInt(timeArr[0]); // Sets minutes equal to the value before the split
    let secs = parseInt(timeArr[1]); // Set seconds equal to the value after the split
    let totSecs = secs+(mins*60); // Converts the time into a single integer for seconds to be used elsewhere
    return totSecs; 
}

function setMulti(currSecs) {
    if(currSecs >= 390) { // First thirty second grace period wherein
        return 1024; // Maximum multiplier is given
    } else {
        let x = (420 - currSecs) / 30; // X represents time remaining in units of 30 seconds since grace period ended
        return Math.round(2 ** (10 - x)); // Time remaining, through x's representation scales logarithmically into multiplier
    }
}

function wordScore(past, curr) {
    let timeDiff = past - curr; // Gets time difference
    if (timeDiff < 5) { // For first 5 seconds...
        return 256; // you get max score for base
    } else {
        let x = (timeDiff - 5) / 5; // remove freebie 5 seconds from calculation, then turn time taken into units of 5
        return Math.round(2 ** (8 - (x/2))); // Returns an integer score value according to logarithmic curve.
    }
}

// Global Variables
let lastCalled = 420; // Last time the updateScore() function was called; defaults to start time.
let totalScore = 0; // Total Score, initialized as 0 because that's how games work.

function updateScore() {
    let currTime = callTimer(); // Get current time
    let multi = setMulti(currTime); // Set multiplier based on current time
    let baseScore = wordScore(lastCalled, currTime); // get base points for the time taken
    totalScore += baseScore * multi; // Multiply out and add them to the total points
    lastCalled = currTime; // Make this the new "last time" for the wordScore function
    return totalScore; // Returns new value of the total score
}