<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hangman Game</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/wordsearch.css">
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

        <h1>Jay to Z</h1>
        <break>
        <h6>Word Search</h6>
            <p>placeholder text</p>
        <ul>
            <div class="divv" id="row8">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row7">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row6">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row5">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row4">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row3">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row2">
                <li class="box" id="b801">hello</li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
            <div class="divv" id="row1">
                <li class="box" id="b801"></li>
                <li class="box" id="b802"></li>
                <li class="box" id="b803"></li>
                <li class="box" id="b804"></li>
                <li class="box" id="b805"></li>
                <li class="box" id="b806"></li>
                <li class="box" id="b807"></li>
                <li class="box" id="b808"></li>
                </div>
                    </ul>
</body>
</html>