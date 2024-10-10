<!DOCTYPE html>
<script src="../commands.js" defer></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lyet</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            /* image directory: ".." in front takes it back a folder:*/
            background-image: url('../images/lyetPLACEHOLDER.jpg');
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
    <h2>Welcome to Lyet</h2>
    <p data-file="lyet" style="display:none;">Lyet is part of the Masters Center for Science, Mathematics, and Engineering, housing the Biology department. 
    This is where you'll attend biological sciences classes. It has two floors, and the second floor features the Anatomy Lab and most classrooms while the first floor primarily features offices.</p>
</body>
</html>
