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




// Function to set a cookie
// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Function to set a cookie
    function setCookie(name, value, days) {
        const d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000)); // Set expiry date
        let expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }

    // Function to handle setting multiple cookies
    function setCookiesFromList(cookieValues, days) {
        let values = cookieValues.split(','); // Split input into an array
        values.forEach(function(value, index) {
            setCookie('cookie' + (index + 1), value.trim(), days); // Set cookies for each value
        });
    }

    // Add event listener for form submission
    document.getElementById('cookieForm').addEventListener('submit', function(event) {
        let cookieValues = document.getElementById('cookieValues').value; // Get the comma-separated values from the text field

        if (cookieValues) {
            setCookiesFromList(cookieValues, 1); // Set multiple cookies from the list of values
        }
        // Let PHP handle the redirection, no need to block the form submission
    });
});

