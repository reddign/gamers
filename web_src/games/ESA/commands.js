document.addEventListener('DOMContentLoaded', function () {

    //Variables
    let current_location;

    // Initial test for text commands
    const command = document.getElementById("Text_Input");
    const button = document.getElementById("Button2")
    const location_change = document.getElementById("location_change");

    button.addEventListener("click", function () {
        if(command.value == "help"){
            help();
        }
        if(command.value == "look"){
            look();
        }
        if(command.value == "gotobowers"){
            goto("bowers");
            current_location = "bowers"
        }
        if(command.value == "gotobsc"){
            goto("bsc");
            current_location = "bsc"
        }
    });

    function help(){
        //Displays all commands
        console.log("help: Shows Commands\nlook: Describes Surroundings\nitems: Show Inventory\nuse: Uses selected item\ngoto: Travel to selected location\ngrab: Pick up item in area\ntalk: Talks to person in area\n");

    }

    function look(current_location){
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

    function goto(location){
        //Changes location based on input
        if (window.location.pathname == '/gamers/web_src/games/ESA/ESA.php'){
            window.location.replace('locations/'+location+'.php')
        } else{
            window.location.replace('../locations/'+location+'.php')
        }
    }


    function talk(){
        //Interacts with / talks to nearby person (if available)    

    }

});