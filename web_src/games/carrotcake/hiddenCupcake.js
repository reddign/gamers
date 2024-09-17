//Task Description: Place cupcakes hidden on the board and work to allow the actor to find and remove cupcakes and add to the score.
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

// Example usage
// Create a 5x5 board initialized with 0 (empty spaces)
let board = Array.from({ length: 5 }, () => Array(5).fill(0));

// Place 3 hidden cupcakes on the board
hiddenCupcake(board, 3);

console.log(board);
