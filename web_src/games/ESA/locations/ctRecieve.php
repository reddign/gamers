<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Values</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../../stylesheets/ESA.css">
    <style>
        body {
            background-image: url('https://assets.bonappetit.com/photos/5ca534485e96521ff23b382b/1:1/w_1920,c_limit/chocolate-chip-cookie.jpg');
            background-size: cover;  
            background-position: center 60px; 
            background-repeat: no-repeat; 
        }
    </style>
</head>
<body>
    <h2>Cookie Values Received</h2>
    <ul>
        <?php
        // Loop through cookies and display each cookie that was set
        for ($i = 1; $i <= 10; $i++) { // Adjust the range if you expect more cookies
            $cookieName = 'cookie' . $i;
            if (isset($_COOKIE[$cookieName])) {
                echo "<li>" . htmlspecialchars($cookieName) . ": " . htmlspecialchars($_COOKIE[$cookieName]) . "</li>";
            }
        }
        ?>
    </ul>
    <button onclick="window.location.href='ctSend.php'";>Return</button>
</body>
</html>
