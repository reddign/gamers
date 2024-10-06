<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Cookie Input Page</title>
    <link href="link" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            background-image: url('image');
            background-size: cover;  
            background-position: center 60px; 
            background-repeat: no-repeat; 
        }
    </style>
</head>
<body>
    <h2>Enter values to store in cookies (comma-separated)</h2>

    <form id="cookieForm" action="yourNewPage.php" method="POST">
        <label for="cookieValues">Enter Cookie Values (comma-separated):</label>
        <input type="text" id="cookieValues" name="cookieValues" required class="large-input">
        <button type="submit" id="submitBtn">Submit</button>
    </form>

    <script src="../actions.js"></script>
    <script>
        // Read cookies when the page loads
        window.onload = readCookiesOnLoad; // Ensure this function exists in actions.js
    </script>
    <p data-file="zug" style="display:none;">Zug Hall is home to music majors and several administrative offices, including Financial Aid, the Business Office, and Registration and Records. The lower level is where you’ll find classrooms and music practice rooms
    where students can practice playing their instruments without any interruption. The second floor houses offices as well as the recital room and 
    a gallery space where student art are often showcased.</p>
</body>
</html>
