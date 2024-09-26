

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie test 1</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            /* image directory: ".." in front takes it back a folder:*/
            background-image: url('https://assets.bonappetit.com/photos/5ca534485e96521ff23b382b/1:1/w_1920,c_limit/chocolate-chip-cookie.jpg');
            background-size: cover;  /*This makes sure the image covers the entire page */
            background-position: center 60px; /*  vertical adjustment in pixels */
            background-repeat: no-repeat; /* Ensures the image doesn’t repeat */
        }
    </style>
</head>
<body>
    <script>
    function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days*24*60*60*1000));
            let expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        // Set cookie when the user leaves the page
        window.onbeforeunload = function() {
            setCookie("visitedPage", "page1", 1);  // Set cookie "visitedPage" to "page1"
            setCookie("visitedPage2", "Congrats! retrieved cookies successfully", 2); //Cookie visitedpage2 to conrgats
        };
    </script>
    <h2>Test page for sending and reciving cookies</h2>
</body>
<button id ="Button1" onclick="window.location.href='../locations/ctRecieve.php'";>CookieTest</button>
</html>



