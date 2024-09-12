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



    }

}