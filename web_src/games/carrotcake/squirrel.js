//code for controlling the squirrel enemies
//includes animation code as well as code for targetting and pathfinding

class Squirrel {

    constructor(x, y, method) {

        //position of squirrel
        this.xPos = x;
        this.yPos = y;

        //target position of squirrel that it will path to
        this.xTar = 0;
        this.yTar = 0;

        //which targetting method the squirrel will use, will be varied to prevent all squirrels following the same path
        this.tarMethod = method;

    }

    target() {

        //called to update the squirrels target tile
        //method for changing the target tile depends on targetting method, similar to pac man ghosts

    }

    move() {

        //have the squirrel move towards their target tile
        //will have pathfinding code to help with naviagation and will hopefully have checks in place to prevent the squirrels from getting stuck

    }

}