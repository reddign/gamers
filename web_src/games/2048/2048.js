let board;
const rows = 4;
const cols = 4;

// Define the images here and their values
const imageMapping = {
  2: 'images/image1.png',
  4: 'images/image2.png',
  8: 'images/image3.png',
  16: 'images/image4.png',
  32: 'images/image5.png',
  64: 'images/image6.png',
  128: 'images/image7.png',
  256: 'images/image8.png',
  512: 'images/image9.png',
  1024: 'images/image10.png',
  2048: 'images/image11.png'
};

function startGame() {
  board = createBoard();
  addInitialTiles();
  renderBoard();
}

// This function creates the board
function createBoard() {
    const newBoard = [];
    for (let i = 0; i < rows; i++) {
      newBoard[i] = [];
      for (let j = 0; j < cols; j++) {
        newBoard[i][j] = 0;
      }
    }
    return newBoard;
  }
  
  // This function adds the first tile which is image1.png
  // TODO: right now the function puts only the first image but the real game generates
  // either the first or second value
  function addInitialTiles() {
    let emptyPositions = [];

    // loop through the board to find empty positions
    // when an empty position is found, an object storing those coordinates is added to emptyPositions
    for (let i = 0; i < rows; i++) {
      for (let j = 0; j < cols; j++) {
        if (board[i][j] === 0) {
          emptyPositions.push({ x: i, y: j });
        }
      }
    }

    // randomly adds two blocks to start with the initial starting value (2)
    // it loops twice to add two spots
    for (let i = 0; i < 2; i++) {
      if (emptyPositions.length > 0) {
        const randomIndex = Math.floor(Math.random() * emptyPositions.length);
        const { x, y } = emptyPositions[randomIndex];
        board[x][y] = 2;
        emptyPositions.splice(randomIndex, 1);
      }
    }
    renderBoard();
  }

function renderBoard() {
  const gameBoardElement = document.querySelector('.game-board');
  gameBoardElement.innerHTML = '';

  for (let i = 0; i < rows; i++) {
    for (let j = 0; j < cols; j++) {
      const tileValue = board[i][j];
      const tileElement = document.createElement('div');
      tileElement.classList.add('tile');

      if (imageMapping.hasOwnProperty(tileValue)) {
        const img = document.createElement('img');
        img.src = imageMapping[tileValue];
        img.alt = `Tile Image ${tileValue}`;
        tileElement.appendChild(img);
      } else {
        tileElement.textContent = '';
      }

      gameBoardElement.appendChild(tileElement);
    }
  }
}

// Adds a keypress event for the arrow keys - goes to move tiles which takes care of movement
function handleKeyPress(event) {
    const key = event.key;
    let moved = false;
  
    switch (key) {
      case 'ArrowUp':
        moved = moveTiles('up');
        break;
      case 'ArrowDown':
        moved = moveTiles('down');
        break;
      case 'ArrowLeft':
        moved = moveTiles('left');
        break;
      case 'ArrowRight':
        moved = moveTiles('right');
        break;
      default:
        break;
    }
  
    if (moved) {
      addRandomTile();
      renderBoard();
    }
  }
  
  // This listens to the event and moves the tile as directed
  // this was a real pain to code so there very well could be some bugs
  //  CHECK THIS FUNCTION
  function moveTiles(direction) {
    let moved = false;
  
    switch (direction) {
      case 'up':
        for (let j = 0; j < cols; j++) {
          for (let i = 1; i < rows; i++) {
            if (board[i][j] !== 0) {
              let k = i - 1;
              while (k >= 0 && board[k][j] === 0) {
                board[k][j] = board[k + 1][j];
                board[k + 1][j] = 0;
                k--;
                moved = true;
              }
              if (k >= 0 && board[k][j] === board[k + 1][j]) {
                board[k][j] *= 2;
                board[k + 1][j] = 0;
                moved = true;
              }
            }
          }
        }
        break;
  
      case 'down':
        for (let j = 0; j < cols; j++) {
          for (let i = rows - 2; i >= 0; i--) {
            if (board[i][j] !== 0) {
              let k = i + 1;
              while (k < rows && board[k][j] === 0) {
                board[k][j] = board[k - 1][j];
                board[k - 1][j] = 0;
                k++;
                moved = true;
              }
              if (k < rows && board[k][j] === board[k - 1][j]) {
                board[k][j] *= 2;
                board[k - 1][j] = 0;
                moved = true;
              }
            }
          }
        }
        break;
  
      case 'right':
        for (let i = 0; i < rows; i++) {
          for (let j = cols - 2; j >= 0; j--) {
            if (board[i][j] !== 0) {
              let k = j + 1;
              while (k < cols && board[i][k] === 0) {
                board[i][k] = board[i][k - 1];
                board[i][k - 1] = 0;
                k++;
                moved = true;
              }
              if (k < cols && board[i][k] === board[i][k - 1]) {
                board[i][k] *= 2;
                board[i][k - 1] = 0;
                moved = true;
              }
            }
          }
        }
        break;

        case 'left':
      for (let i = 0; i < rows; i++) {
        for (let j = 1; j < cols; j++) {
          if (board[i][j] !== 0) {
            let k = j - 1;
            while (k >= 0 && board[i][k] === 0) {
              board[i][k] = board[i][k + 1];
              board[i][k + 1] = 0;
              k--;
              moved = true;
            }
            if (k >= 0 && board[i][k] === board[i][k + 1]) {
              board[i][k] *= 2;
              board[i][k + 1] = 0;
              moved = true;
            }
          }
        }
      }
      break;
  
      default:
        break;
    }
  
    return moved;
  }
  
  
  //TODO: write this function to check is 2048 has been achieved (image11)
  function checkWin() {

  }
  
  //TODO: write this function to check if moves are still available
  function checkLose() {
  
  }

  // basically same thing as addInitialTile except this is called after each move and only iterates once
  function addRandomTile() {
    let emptyPositions = [];

    for (let i = 0; i < rows; i++) {
      for (let j = 0; j < cols; j++) {
        if (board[i][j] === 0) {
          emptyPositions.push({ x: i, y: j });
        }
      }
    }
  
    if (emptyPositions.length > 0) {
      const randomIndex = Math.floor(Math.random() * emptyPositions.length);
      const { x, y } = emptyPositions[randomIndex];
      board[x][y] = 2;
    }
  }
  
function resetGame() {
  startGame();
}

document.addEventListener('keydown', function(event) {
    handleKeyPress(event);
  });
  
document.addEventListener('DOMContentLoaded', startGame);
