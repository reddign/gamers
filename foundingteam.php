<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Etown Trivia</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/about.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar bg-blue">
            <a class="navbar-brand" href="index.php">
                <img id="logo" src="../../includes/images/logo.png" alt="Logo" width='100px.'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="hidden" href="settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../games/menu.php">
                            <i class="fas fa-gamepad"></i> Games
                        </a>
                    </li>
                    <!-- Checking whether to display login or logout button. -->
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="buttons">
            <a href="../about.php"><button class="button button2">Go Back!</button></a> 
        </div>
    
    <div class= "team-section">

        <div id="welcome-text">THE FOUNDING TEAM</div>
        <br>
        <div class= "section"> This project was taken on and created by team API from Etown's CS341 (Software Engineering) in Fall 2023. <BR></div>
        <br>
        <div class="pfp">
            <a href="NolanPettit.php"><img id="NolanPic" src="../teampics/goat.png" alt="Nolan Pettit" ></a>
            <a href="EmmaMaykut.php"><img id="EmmaPic" src="../teampics/cat.png" alt="Emma Maykut" ></a>
            <a href="DanielleStrausburger.php"><img id="DaniPic" src="../teampics/turtle.png" alt="Danielle Strausburger" ></a>
            <a href="IsabelPMattivi.php"><img id="IsabelPic" src="../teampics/redpanda.png" alt="Isabel Pacheco Mattivi" ></a>
            <a href="StephanieMotz.php"><img id="StephPic" src="../teampics/giraffe.png" alt="Stephanie Motz" ></a>
        </div>

        <div class="section" id="team-names">
            <span class="name">From Left to Right: </span> 
            <span class="name">Nolan Pettit, Emma Maykut, Danielle Strausburger, Isabel Pacheco Mattivi, and Stephanie Motz </span>
        </div>
</body>
