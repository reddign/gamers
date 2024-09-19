// Initial test for text commands

var item = 'Key';       // This is testing, change later
var location = 'esbenshade'; // This is testing, change later

function Help(){
    //Displays all commands
    System.out.println("Help\n Look\n Items\n Use\n Moveto\n Grab\n Talk\n");

}

function Look(){
    //Describes current surroundings

}

function Items(){
    //Displays current inventory of held items

    // const items = [""];
    

    // for (i = 0; i < array.length; i++)
    //     console.log(items);

}

function Grab(){
    //Requires input after command (Grab (item)) to function
    //Syntax example: Grab Key
    //Grabs chosen item and places it into the players inventory

    items.push(item);
}

function Use(){
    //Requires input after command (Use (insert item here)) to function
    //Syntax example:   Use Key
    //Interact with or use specified item

}

function Moveto(){
    //Requires input after command (Moveto (location)) to function
    //Syntax example:  Moveto BSC
    //Moves player character to new location

}


function Talk(){
    //Interacts with / talks to nearby person (if available)    

}

// TESTING AREA BELOW, THIS WILL HAVE ALL OF THE LOCATIONS AND THE RELEVANT LOOK AND INTERACTION COMMANDS, THIS IS VERY SUBJECT TO CHANGE.

const esbenshade = {
    description: 'This is esbenshade'

};
