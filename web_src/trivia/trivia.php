<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stylesheets/trivia.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="trivia.js"></script>

    <title>Menu for game page</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar bg-blue">
            <a class="navbar-brand" href="index.php">
                <img id="logo" src="../includes/images/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../general/index.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="hidden" href="../general/settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../general/about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../games/menu.php">
                            <i class="fas fa-gamepad"></i> Games
                        </a>
                    </li>
                    <!-- Checking whether to display login or logout button. -->
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../general/logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../general/login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>

    <main>
        <section id="welcome">
            <div id="welcome-message-trivia">Welcome to our Trivia Page!</div>
            <br>
            <div id="trivia-subtext"> Answer 3 Etown-based Trivia Questions below to move on!</div>
            <br><br>
        </section>
        <section id="question-and-answer">
            <div id="basicContainer">
                <div id="question-container"> </div>
                <div id="answer-options"></div>
                <br>
                <div id="circle1"></div>
                <div id="circle2"></div>  
                <div id="circle3"></div>
            </div>
    </main>


    <!-- <div id="game-select">
        <label for="game-selector">Select a game: </label>
        <select id="game-selector" onchange="loadGame(this)">
            <option value="">Select a game</option>
            <option value="hangman">Hangman</option>
            <option value="flappybird">Flappy Bird</option>
            <option value="pacman">Pacman</option>
        </select>
    </div> -->

    <script>
        function loadGame(select) {
            const selectedGame = select.value;
            if (selectedGame) {
                window.location.href = selectedGame + "/" + selectedGame + ".php";
            }
        }
    </script>
</body>
</html>
