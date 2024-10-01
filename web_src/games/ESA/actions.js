//testing
console.log("actions.js loaded");

class Actions {
    constructor() {
        this.name = "actions";
    }

    help(currentLocation){
        // List available functions in your current state
    }

    look(currentLocation) {
        // Used to observe surroundings
    }

     goto(destination) {
        // Get the value from the input field
        var destination = document.getElementById("destinationInput").value;
    
        // Define the base URL for navigation
        var baseUrl = 'locations/';
    
        // Append the destination and add '.php' extension
        var url = baseUrl + destination + '.php';
    
        // Redirect to the new URL
        window.location.href = url;
    }
    

    use(item, currentLocation,){
        // General interaction with environment
    }

    items(){
        // Shows items you currently possess
    }



}
const actions = new Actions();


