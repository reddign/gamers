//Task Description: Place cupcakes hidden on the board and work to allow the actor to find and remove cupcakes and add to the score.
const rows = board.length;
const cols = board[0].length;
let score = 0;
let cupcakes = 0;
// hiddenCupcake() function will allow me to place hidden cupcakes on the board for the user to collect:
function hiddenCupcake(board, numCupcakes) {
    // Loop to place cupcakes until the specified number is hidden
    while (cupcakes < numCupcakes) {
        // Generate random row and column indices
        const randomRow = Math.floor(Math.random() * rows);
        const randomCol = Math.floor(Math.random() * cols);

        // Check if the spot is empty (assuming 0 means empty)
        if (board[randomRow][randomCol] === 0) {
            // Place a cupcake (you can use any value to represent a cupcake, here it's 1)
            board[randomRow][randomCol] = 1;
            cupcakes++;
        }
    }

    return board;
}
//This function would be played IF the actor finds the cupcakes
function findCupcake(board, playerRow, playerColumn){
    //if the current position contains a cupcake(1), remove the cupcake from the board(0), update the score, and decrease the number of cupcakes hidden
    if(board[playerRow][playerColumn] == 1){
        score++;
        cupcakes--;
    } 
    return board;
}
//This function would be played IF the actor removes the cupcakes
function removeCupcake(){

}
//This function would add the hidden cupcakes to the score of the user
function addToScore(){

}