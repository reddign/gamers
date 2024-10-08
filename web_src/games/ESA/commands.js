document.addEventListener('DOMContentLoaded', function () {

    //Variables

    // Initial test for text commands
    var command_input = document.getElementById("Text_Input");
    const button = document.getElementById("Button2");


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
        alert("help: Shows Commands\nlook: Describes Surroundings\nitems: Show Inventory\nuse: Uses selected item\ngoto: Travel to selected location\ngrab: Pick up item in area\ntalk: Talks to person in area\n");

    }

    function look(){
        //Describes current surroundings
        const fileName = window.location.pathname.split('/').pop().replace('.php', '');
        const description = document.querySelector(`p[data-file="${fileName}"]`);

        if (description){
            alert(description.textContent.replace(/\n   /g,""));
        }
        

    }

    function items(){
        //TODO Add items function which displays the items the user has.
        
    }

    function grab(item){
        //TODO Add grab function with item parameter if the item exists in the current location.

        //Requires input after command (Grab (item)) to function
        //Syntax example: Grab Key
        //Grabs chosen item and places it into the players inventory

        items.push(item);
    }

    function use(){
        //TODO Add use function which takes an item parameter.

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
        //TODO Add talk function which works if a person is in the current area.

        //Interacts with / talks to nearby person (if available)    


    }

});