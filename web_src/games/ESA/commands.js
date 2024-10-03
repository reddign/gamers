document.addEventListener('DOMContentLoaded', function () {

    //Variables
    let current_location;

    // Initial test for text commands
    var command_input = document.getElementById("Text_Input");
    const button = document.getElementById("Button2");
    const description = document.getElementById("Description");
    

    button.addEventListener("click", function () {
        var command = command_input.value.split(' ');
        if(command[0] == "help"){
            help();
        }
        if(command[0] == "look"){
            look();
        }
        if(command[0] == "goto"){
            goto(command[1]);
        }
    });

    function help(){
        //Displays all commands
        console.log("help: Shows Commands\nlook: Describes Surroundings\nitems: Show Inventory\nuse: Uses selected item\ngoto: Travel to selected location\ngrab: Pick up item in area\ntalk: Talks to person in area\n");

    }

    function look(){
        //Describes current surroundings
        console.log(description.value);

    }

    function items(){
        //Displays current inventory of held items

        const items = [""];

        console.log(items);
        
    }

    function grab(item){
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