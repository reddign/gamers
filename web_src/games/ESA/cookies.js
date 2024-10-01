


//  COOKIES //

// Function to set a cookie
function setCookie(name, value, days) {
    const d = new Date();
    d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
}

// Function to read a cookie by its name
function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';'); // Split all cookies by semicolon
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);  // Remove any leading spaces
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);  // Return the cookie value
    }
    return null; // Return null if the cookie isn't found
}

// Function to set cookies when the user leaves the page
function setCookiesOnUnload() {
    setCookie("visitedPage", "page1", 1);  // Set cookie "visitedPage" to "page1"
    setCookie("visitedPage2", "Congrats! retrieved cookies successfully", 2); // Set second cookie
}

// Read and log cookies when the page loads
function readCookiesOnLoad() {
    let visitedPage = getCookie("visitedPage");
    let visitedPage2 = getCookie("visitedPage2");

    // Log the values for testing, or handle them as needed
    console.log("Visited Page Cookie: ", visitedPage);
    console.log("Second Cookie: ", visitedPage2);

    // You can also display the cookies on the page if needed
    if (visitedPage) {
        document.body.innerHTML += "<p>Visited Page: " + visitedPage + "</p>";
    }
    if (visitedPage2) {
        document.body.innerHTML += "<p>Second Cookie: " + visitedPage2 + "</p>";
    }
}

// Add event listener for when the user is about to leave the page
window.onbeforeunload = setCookiesOnUnload;

// Call the function to read cookies when the page loads
window.onload = readCookiesOnLoad;


window.onload = function() {
    let visitedPage = getCookie("visitedPage");
    let visitedPage2 = getCookie("visitedPage2");

    console.log("Visited Page Cookie: ", visitedPage);
    console.log("Second Cookie: ", visitedPage2);