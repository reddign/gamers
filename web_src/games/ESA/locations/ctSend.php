#A sample php file which sends cookies.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Input Test</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            background-image: url('https://assets.bonappetit.com/photos/5ca534485e96521ff23b382b/1:1/w_1920,c_limit/chocolate-chip-cookie.jpg');
            background-size: cover 85%;  
            background-position: center 60px; 
            background-repeat: no-repeat; 
        }
    </style>
</head>
<body>
    <h2>Enter values to store in cookies</h2>

    <!-- Form for input -->
    <form id="cookieForm" action="ctRecieve.php" method="POST">
        <label for="cookieValues">Enter Cookie Values (comma-separated):</label>
        <input type="text" id="cookieValues" name="cookieValues" required style = "width:100px"> 
        <button type="submit" id="submitBtn">Send Cookies</button>
    </form>

    <!-- Link to external JavaScript file for cookie processing -->
    <script src="../actions.js"></script>
</body>
</html>
