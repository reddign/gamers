
<?php
// Check if the cookies are set
$visitedPage = isset($_COOKIE['visitedPage']) ? $_COOKIE['visitedPage'] : "No cookie found";
$visitedPage2 = isset($_COOKIE['visitedPage2']) ? $_COOKIE['visitedPage2'] : "No second cookie found";
?>

<!-- HTML to show cookie values -->

<!DOCTYPE html>
<html>
<head>
    <title>Read Cookie on Page Load</title>
    <style>
        body {
            /* image directory: ".." in front takes it back a folder:*/
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Smiley.svg/640px-Smiley.svg.png');
            background-size: cover;  /*This makes sure the image covers the entire page */
            background-position: center 60px; /*  vertical adjustment in pixels */
            background-repeat: no-repeat; /* Ensures the image doesn’t repeat */
        }
    </style>
</head>
<body>
    <h1>Page 2</h1>
    <h2>Reading Cookies on the Next Page (cookieTest2.php)</h2>

    <!-- Display the cookie values -->
    <p>Visited Page: <?php echo htmlspecialchars($visitedPage); ?></p>
    <p>Second Cookie: <?php echo htmlspecialchars($visitedPage2); ?></p>

    <button onclick="window.location.href='ctSend.php';">Go Back</button>
    <script src="../cookies.js"></script>
</body>

</html>

