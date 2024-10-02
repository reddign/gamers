/*
 * Creation Date: 9/15/24
 * Author: Wes J. Ryan
 * 
 * Last Edited: 10/2/24 (12:39am)
 * Last Edited by: Wes J. Ryan
 */

/*
 * The plan:
 * The scoring system will be involve two logarithmic-based functions, one to determine the base
 * points of a word, the other of which will determine the multiplier applied to those points.
 * The results of these functions, however, will be the dependent variables, built upon functions of 
 * the timer, yet to be implemented. As such, the following pseudo-code has been provided to 
 * demonstrate logical flow.
 */

function callTimer() {
    let timeGrab = document.getElementById("timer").innerHTML;
    let timeArr = timeGrab.split(":");
    let mins = parseInt(timeArr[0]);
    let secs = parseInt(timeArr[1]);
    let totSecs = secs+(mins*60);
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

// Global Variables of this file
let lastCalled = 420; // Last time the updateScore() function was called; defaults to start time.
let totalScore = 0; // Total Score, initialized as 0 because that's how games work.

// THE FOLLOWING FUNCTION IS ESSENTIAL .MAIN() OF THIS FILE
function updateScore() {
    let currTime = callTimer(); // Get current time
    let multi = setMulti(currTime); // Set multiplier based on current time
    let baseScore = wordScore(lastCalled, currTime); // get base points for the time taken
    totalScore += baseScore * multi; // Multiply out and add them to the total points
    lastCalled = currTime; // Make this the new "last time" for the wordScore function
    return totalScore; // Returns new value of the total score
}