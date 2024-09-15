/*
 * Creation Date: 9/15/24
 * Author: Wes J. Ryan
 * 
 * Last Edited: N/A
 * Last Edited by: N/A
 */

/*
 * The plan:
 * The scoring system will be involve two logarithmic-based functions, one to determine the base
 * points of a word, the other of which will determine the multiplier applied to those points.
 * The results of these functions, however, will be the dependent variables, built upon functions of 
 * the timer, yet to be implemented. As such, the following pseudo-code has been provided to 
 * demonstrate logical flow.
 */

/*
 * The following statement determines the multiplier of any given word's score, to be called as
 * setMulti(), to be called every second (or perhaps 5) so that the player can see their multiplier.
 */

function setMulti() {
    if(secRemain >= 390) {
        multiplier = 1024;
    } else {
        multiplier = multiLog();
    }
}

function multiLog() {
    /*
     * Takes current secRemaining, and uses it as the independent x variable in a logarithmic function
     * the y-value of which will be rounded to the nearest hundreth and used as the multiplier.
     * 
     * The displayed multiplier will have 3 significant figures of data at least, such that the tenths
     * place is only displayed once the multiplier has dipped below 100, and the same for hundreths and
     * below 10.
     * 
     * The following value pairings will be placed along the curve:
     * (390, 1024), (360, 512), (330, 256), (300, 128), (270, 64), (240, 32), (210, 16), (180, 8.0)
     * (150, 4.0), (120, 2.0), (90, 1.0), (60, 0.5), (30, 0.25), (0, 0.125)
     */
}

function wordScore() {
    /*
     * Takes the time difference between the start/last word's time and the time of the current word
     * found and then plugs that into a logarithmic function to determine the base point value of a 
     * found word.
     * 
     * Returns an integer score value.
     */
}

// Whenever word found call wordScore();
totalScore += wordPoints * multiplier;