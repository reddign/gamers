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
    
</body>
</html>
