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

    goToPage(destination) {
        // Get the value from the text input
        var location = document.getElementById('locationInput').value;
        // Construct the URL (You may want to validate or sanitize this input)
        var url = 'locations/' + destination + '.php';
        // Redirect to the constructed URL
        window.location.href = url;
    }
    

    use(item, currentLocation,){
        // General interaction with environment
    }

    items(){
        // Shows items you currently possess
    }



}
