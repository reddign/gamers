<!DOCTYPE html>
<script src="../commands.js" defer></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSC</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            /* image directory: ".." in front takes it back a folder:*/
            background-image: url('../images/bsc.jpg');
            background-size: cover;  /*This makes sure the image covers the entire page */
            background-position: center 60px; /*  vertical adjustment in pixels */
            background-repeat: no-repeat; /* Ensures the image doesn’t repeat */
        }
    </style>
    <style>
        #Text_Input{
            width: 250px; /* Set desired width */
            height: 40px; /* Set desired height */
            font-size: 16px; /* Adjust font size if needed */
            padding: 5px; /* Add padding for better look */
        }
        #Button2 {
            width: 200px; /* Set desired width */
            height: 35px; /* Set desired height */
            font-size: 16px; /* Adjust font size if needed */
            padding: 5px; /* Add padding for better look */
        }
        </style>
            <input type="text" id="Text_Input" placeholder="Type a command">
            <button id ="Button2">Action</button>
</head>
<body>
    <h2>Welcome to the BSC</h2>

    <p data-file="bsc" style="display:none;">The Baugher Student Center, or BSC, is a central spot where you're likely to stop by every day.
    The first floor offers the Jays Nest for made-to-order food as well as other convenience items, mail services for all your package needs, 
    Blue Bean where you can get Starbucks, and the college store. The KAV is also located here. This is where various campus events are hosted. On the second floor, 
    you'll find the Marketplace (the main dining hall) and several offices like the Center for Student Success, Counseling Services, and Career Services.</p>
</body>
</html>
