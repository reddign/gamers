const rows = board.length;
const cols = board[0].length;
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
//part where the player can find and remove cupcakes
function findAndRemove() {
    //this is removing the cupcake from the board (setting the cell to 0)
    board[row][col] =0;
    return board;
}

//part where the hidden cupcakes that are found, are then added to the score
function addToScore(){
    score += cupcakes;
    // setting the cupcakes to 0, since they all are added to the score
    cupcakes = 0;
    return score
}