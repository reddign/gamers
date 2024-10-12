<!DOCTYPE html>
<script src="../commands.js" defer></script>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esbenshade</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            /* image directory: ".." in front takes it back a folder:*/
            background-image: url('../images/esbenshade1.jpg');
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
    <h2>Welcome to Esbenshade Hall</h2>

    <p data-file="esbenshade" style="display:none;">Esbenshade is part of the Masters Center for Sciences, Mathematics, and Engineering. It houses classrooms for Engineering, Computer Science, Mathematics, and Occupational Therapy. 
    The building has three floors: the first floor is home to the Engineering department, the second floor hosts the Computer Science and Psychology departments, and the third floor is where 
    you'll find Mathematics and Occupational Therapy. It also features the Fabrication Lab, Networking Lab, and Robotics Lab.</p>
</body>
</html>
