/*
 * This File is included in it's entirety in mapLogic.js
 * At like line 200
 * TODO: Delete this file
 *
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