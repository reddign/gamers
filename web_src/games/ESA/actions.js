//testing
console.log("actions.js loaded");

// This file was used to transfer cookies between pages in hopes of saving variables across rooms

// TODO
// Find a way to have a score system that would save to a JS file


// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Function to set a cookie
    function setCookie(name, value) {
        // Set cookie without the expires attribute for a session cookie
        document.cookie = name + "=" + value + ";path=/"; // Session cookie
    }

    // Function to handle setting multiple cookies
    function setCookiesFromList(cookieValues) {
        let values = cookieValues.split(','); // Split input into an array
        values.forEach(function(value, index) {
            setCookie('cookie' + (index + 1), value.trim()); // Set cookies for each value
        });
    }

    // Add event listener for form submission
    document.getElementById('cookieForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission behavior
        let cookieValues = document.getElementById('cookieValues').value; // Get the comma-separated values from the text field

        if (cookieValues) {
            setCookiesFromList(cookieValues); // Set multiple cookies from the list of values
        }
        // Let PHP handle the redirection, no need to block the form submission
        this.submit(); // Allow form submission to continue after setting cookies
    });
});
