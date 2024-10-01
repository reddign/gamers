//code for controlling the squirrel enemies
//includes animation code as well as code for targetting and pathfinding

class Squirrel {

    constructor(x, y, method) {

        //position of squirrel
        this.xPos = x;
        this.yPos = y;

        //target position of squirrel that it will path to
        this.xTar = NaN;
        this.yTar = NaN;

        //which targetting method the squirrel will use, will be varied to prevent all squirrels following the same path
        //three main targetting methods (string)
        //direct    - target tile matches player position
        //flank     - target tile is slightly behind the player
        //intercept - target tile is in front of the player
        this.tarMethod = method;

    }

    target(board) {

        //called to update the squirrels target tile
        //method for changing the target tile depends on targetting method, similar to pac man ghosts

        //update target tile if it is reached (will later be updated every movement tick instead)
        //stub code for different methods

        //these values would have to be grabbed in some way
        let playerX = 0;
        let playerY = 0;
        let playerDir = "left";
        
        let player_dist = 35; //placeholder numbers (calculate later), squirrels will not pathfind directly to player when past a certain distance
        let dist_thresh = 30; //helps with reducing difficulty since otherwise squirrels will always be able to follow and corner the player

        if(player_dist < dist_thresh) {
        
            if(self.tarMethod == "direct") {

                //set target coordinates to player coordinates
                self.xTar = playerX;
                self.yTar = playerY;

            } else if(self.tarMethod == "flank") {

                //set target coordinates to just behind the player
                switch(playerDir) {
                    case "left":
                            self.xTar = playerX + 2;
                            self.yTar = playerY;
                        break;

                    case "up":
                            self.xTar = playerX;
                            self.yTar = playerY + 2;
                        break;

                    case "right":
                            self.xTar = playerX - 2;
                            self.yTar = playerY;
                        break;

                    case "down":
                            self.xTar = playerX;
                            self.yTar = playerY - 2;
                        break;

                    default:
                            self.xTar = playerX;
                            self.yTar = playerY;
                        break;

                }

            } else if(self.tarMethod == "intercept") {
            
                //set target coordinates to just in front of player
                switch(playerDir) {
                    case "left":
                            self.xTar = playerX - 2;
                            self.yTar = playerY;
                        break;

                    case "up":
                            self.xTar = playerX;
                            self.yTar = playerY - 2;
                        break;

                    case "right":
                            self.xTar = playerX + 2;
                            self.yTar = playerY;
                        break;

                    case "down":
                            self.xTar = playerX;
                            self.yTar = playerY + 2;
                        break;

                    default:
                            self.xTar = playerX;
                            self.yTar = playerY;
                        break;

                }

            }
        
        } else {

            if((this.xTar == this.xPos || isNaN(this.xTar)) && 
               (this.yTar == this.yPos || isNaN(this.yTar))) {

                //just pick a random tile for now
                this.xTar = Math.floor(Math.random() * board.length);
                this.yTar = Math.floor(Math.random() * board[this.xTar].length);

            }

        }

        if(self.xTar < 0 || self.xTar >= board.length) {

            self.xTar = self.xTar % board.length;

        } else if(self.yTar < 0 || self.yTar >= board[self.xTar].length) {

            self.yTar = self.xTar % board[self.xTar].length;

        }

    }

    //TODO: test the base movement function, add different ways of picking target tiles, and improve pathfinding
    move(board) {

        //have the squirrel move towards their target tile
        //will have pathfinding code to help with naviagation and will hopefully have checks in place to prevent the squirrels from getting stuck

        //initial pathfinding (0 is empty, 1 is cupcake, 2 is wall, 3 is player, 4 is a squirrel)
        //this is not meant to stay or be definitive code, just temporary until further development is done

        this.target(board);

        board[this.xPos][this.yPos] = 0;

        //if not aligned on x axis move on x, else move on y
        if(this.xPos != this.xTar) {
            
            if(this.xPos > this.xTar) {

                //check if position being moved to is a wall or cupcake and if not move
                if(board[this.xPos - 1][this.yPos] != 1 && board[this.xPos - 1][this.yPos] != 2) this.xPos--;

            } else {

                //check if position being moved to is a wall or cupcake and if not move
                if(board[this.xPos + 1][this.yPos] != 1 && board[this.xPos + 1][this.yPos] != 2) this.xPos++;

            }

        } else {

            if(this.yPos > this.yTar) {

                //check if position being moved to is a wall or cupcake and if not move
                if(board[this.yPos - 1][this.yPos] != 1 && board[this.yPos - 1][this.yPos] != 2) this.yPos--;

            } else {

                //check if position being moved to is a wall or cupcake and if not move
                if(board[this.yPos + 1][this.yPos] != 1 && board[this.yPos + 1][this.yPos] != 2) this.yPos++;

            }

        }

        board[this.xPos][this.yPos] = 4;

        return board;

    }

}