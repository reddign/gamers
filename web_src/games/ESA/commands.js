document.addEventListener('DOMContentLoaded', function () {

    // Initial test for text commands
    const command = document.getElementById("Text_Input");
    const button = document.getElementById("Button2")

    button.addEventListener("click", function () {
        if(command.value == "help"){
            help();
        }
        if(command.value == "look"){
            look();
        }
    });

    function help(){
        //Displays all commands
        console.log("Help\n Look\n Items\n Use\n Moveto\n Grab\n Talk\n");

    }

    function look(){
        //Describes current surroundings

    }

    function items(){
        //Displays current inventory of held items

        // const items = [""];
        

        // for (i = 0; i < array.length; i++)
        //     console.log(items);

    }

    function grab(){
        //Requires input after command (Grab (item)) to function
        //Syntax example: Grab Key
        //Grabs chosen item and places it into the players inventory

        items.push(item);
    }

    function use(){
        //Requires input after command (Use (insert item here)) to function
        //Syntax example:   Use Key
        //Interact with or use specified item

    }

    function goto(){
        //Requires input after command (Moveto (location)) to function
        //Syntax example:  Moveto BSC
        //Moves player character to new location

    }


    function talk(){
        //Interacts with / talks to nearby person (if available)    

    }

});