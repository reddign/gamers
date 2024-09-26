<!-- page2.php -->
<?php
// Check if the "visitedPage" cookie exists
if (isset($_COOKIE['visitedPage'])) {
    $visitedPage = $_COOKIE['visitedPage'];
} else {
    $visitedPage = "No page visited yet.";
}
?>

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
    <p>This is the second page.</p>

    <p>Cookie Value: <?php echo $visitedPage; ?></p>

</body>
</html>

