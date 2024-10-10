<?php
session_start();
?>

<!DOCTYPE html>
<script src="commands.js" defer></script>
<html>
<head>
    <title>Etown Student Adventure</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/ESA.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar bg-blue">
        <a class="navbar-brand" href="index.php">
            <img id="logo" src="../../includes/images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../general/index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="hidden" href="../../general/settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>
                <li class="nav-item">
                        <a class="nav-link" href="../../general/about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="../menu.php">
                        <i class="fas fa-gamepad"></i> Games
                    </a>
                </li>
                <!-- Checking whether to display login or logout button. -->
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    
    <main>

    <h1>Room Template</h1>
        <p>Description goes here.</p>
    
    <section id= "ESAPics">
        <img id="location_change" align="center" src="../../includes/images/logo.png" width=200 height=200>
    </section>

    <section id="ESA">
        <div class="ESA-container">
        <div class="input-section">
        <style>
        #Text_Input{
            width: 250px; /* Set desired width */
            height: 40px; /* Set desired height */
            font-size: 16px; /* Adjust font size if needed */
            padding: 5px; /* Add padding for better look */
        }
        #Button1 {
            width: 200px; /* Set desired width */
            height: 35px; /* Set desired height */
            font-size: 16px; /* Adjust font size if needed */
            padding: 5px; /* Add padding for better look */
        }
        </style>
            <input type="text" id="Text_Input" placeholder="Where would you like to go?">
            <button id ="Button1">TestButton</button>
            
        </div>
        </div>
    </section>
    </section>

    <br>
    </main>
</body>
</html>
