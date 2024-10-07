/*
    File Title: squirrel.js
    Description: Contains the code for the enemy squirrel AI
                 Uses the player direction and movement to attempt to cut off, flank, and directly attack the player
    
    Status: Incomplete
*/

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

    target() {

        //called to update the squirrels target tile
        //method for changing the target tile depends on targetting method, similar to pac man ghosts

        //update target tile if it is reached (will later be updated every movement tick instead)
        //stub code for different methods

        let playerX = characterPos[0]; //var from rpg.json
        let playerY = characterPos[1];
        let playerDir = "left"; //this value would have to be grabbed in some way
        
        //squirrels will not pathfind directly to player when past a certain distance
        //helps with reducing difficulty since otherwise squirrels will always be able to follow and corner the player
        let player_dist = Math.sqrt(((playerX - self.xPos) ** 2) + ((playerY - self.yPos) ** 2)); 
        let dist_thresh = 25.0;

        if(player_dist < dist_thresh) {
        
            if(self.tarMethod == "direct") {

                //set target coordinates to player coordinates
                self.xTar = playerX;
                self.yTar = playerY;

            } else if(self.tarMethod == "flank") {

                //set target coordinates to just behind the player
                switch(playerDir) {
                    case "left":
                            self.xTar = playerX + 5;
                            self.yTar = playerY;
                        break;

                    case "up":
                            self.xTar = playerX;
                            self.yTar = playerY + 5;
                        break;

                    case "right":
                            self.xTar = playerX - 5;
                            self.yTar = playerY;
                        break;

                    case "down":
                            self.xTar = playerX;
                            self.yTar = playerY - 5;
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
                            self.xTar = playerX - 5;
                            self.yTar = playerY;
                        break;

                    case "up":
                            self.xTar = playerX;
                            self.yTar = playerY - 5;
                        break;

                    case "right":
                            self.xTar = playerX + 5;
                            self.yTar = playerY;
                        break;

                    case "down":
                            self.xTar = playerX;
                            self.yTar = playerY + 5;
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

        //prevent targetting an out of bounds tile, just set it to the edge instead
        if(self.xTar < 0) self.xTar = 0;
        if(self.xTar >= board.length) self.xTar = board.length - 1;
        if(self.yTar < 0) self.yTar = 0;
        if(self.yTar >= board[self.xPos].length) self.yTar = board[self.xPos].length - 1;

    }

    //TODO: test the base movement function, add different ways of picking target tiles, and improve pathfinding
    move() {

        //have the squirrel move towards their target tile
        //will have pathfinding code to help with naviagation and will hopefully have checks in place to prevent the squirrels from getting stuck

        //initial pathfinding (0 is empty, 1 is cupcake, 2 is wall, 3 is player, 4 is a squirrel)
        //this is not meant to stay or be definitive code, just temporary until further development on game board is done

        this.target();

        //if not aligned on x axis move on x, else move on y
        if(this.xPos != this.xTar) {
            
            if(this.xPos > this.xTar) {

                //TODO: check if position being moved to is a wall or cupcake and if not move
                this.xPos--;

            } else {

                //TODO: check if position being moved to is a wall or cupcake and if not move
                this.xPos++;

            }

        } else {

            if(this.yPos > this.yTar) {

                //TODO: check if position being moved to is a wall or cupcake and if not move
                this.yPos--;

            } else {

                //TODO: check if position being moved to is a wall or cupcake and if not move
                this.yPos++;

            }

        }

    }

}