<!DOCTYPE html>
<script src="../commands.js" defer></script>
<script src="../actions.js" defer></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zug</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            background-image: url('../images/Zug.jpg');
            background-size: cover;  /*This makes sure the image covers the entire page */
            background-position: center 5%;
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
    <h2>Welcome to Zug!</h2>

    <p data-file="ZugBackup" style="display:none;">Zug Hall is home to music majors and several administrative offices, including Financial Aid, the Business Office, and Registration and Records.
         The lower level is where you’ll find classrooms and music practice rooms where students can practice playing their instruments without any interruption. The second floor houses offices as well as the recital room and 
    a gallery space where student art are often showcased.</p>
</body>
</html>