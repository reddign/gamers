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

        <div id="welcome-text">THE 2024 SOFTWARE ENGINEERING TEAM</div>
        <br>
        <div class= "section"> This project was taken on and continued by the Fall 2024 Software Engineering class. <BR></div>
        <br>
        <div class="pfp">
            <img id="Team2024Pic" src="../teampics/SEteam2024.png" alt="2024 Team to Come picture." width=1000>
        </div>

        <div class="section" id="team-names">
            <!-- <span class="name">From Left to Right: </span>  -->
            <span class="name">
                Kevin Barbieri, Joseph Culkin, Brian Duva, Parker Engle, 
                Leif Hoffman, Cameron Hollabaugh, Laney Humble, James Hutchins,
                Muzahidul Islam, Vincent Lu, John McGovern, Jackson Miller,
                Mildred Nwachukwu-Innocent, Martin Ratchford, Alexander Roop, Wesley Ryan,
                Joshua Schmitt, Ian Skeete, Austin Smith, Matthew Smith,
                Tyler Souders, Joshua Stoner, Camila Torres, Joey Wagner,
                Asher Wayde, Owen Wertzberger, Owen Yang
            </span>
        </div>
</body>
