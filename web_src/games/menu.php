<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stylesheets/gameMenu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
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
                        <a class="nav-link" href="../general/settings.php">
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
                        <a class="nav-link" href="menu.php">
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

    <!-- Ghosts and Pacman -->

    <div class="path">
        <div class="pacman">
            <div class="pacman_eye"></div>
            <div class="pacman_mouth"></div>
        </div>
        <div class="ghost">
        <div class="eyes"></div>
        <div class="skirt"></div>
        
        </div>
    </div>

    <!-- Game Selection -->
    <br><br>
    <div id="welcome-message">
        <p>Game Selection <br> Page!</p>
    </div>

    <div id="game-select">
        <label for="game-selector">Select a game: </label>
        <select id="game-selector" onchange="loadGame(this)">
            <option value="">Select a game</option>
            <option value="hangman">Flight of the Jay</option>
            <option value="flappybird">Flappy Jay</option>
            <option value="2048">2048 - Etown Edition</option>
        </select>
    </div>
    <br><br><br><br><br><br><br>

    <!-- Mario Section -->

    <div class="main-container">
        <div class="mario-block" onclick="showChocolate()">
            <input type="checkbox" id="1">
            <div class= "gif-container"></div>
            <label for="1">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </label>
        </div>
        <div class="mario-block" onclick="showTruman()">
            <div class= "gif-container"></div>
            <input type="checkbox" id="2">
            <label for="2">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </label>
        </div>
        <div class="mario-block mario-block--question" onclick="showBlueJay()">
            <div class= "gif-container"></div>
            <input type="checkbox" id="3">
            <label for="3">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="question-mark"></div>
            </label>
        </div>
        <div class="mario-block" onclick="showCarrotCake()">
            <div class= "gif-container"></div>
            <input type="checkbox" id="4">
            <label for="4">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </label>
        </div>
    </div>

    
    <script>
        function showBlueJay() {
        const bluejayImage = new Image();

        bluejayImage.src = "menuImages/bluejayLogo.png"; 

        // Adding style to bluejay
        bluejayImage.style.width = '5%';
        bluejayImage.style.height = '9%'; 
        bluejayImage.style.position = 'absolute';
        bluejayImage.style.top = '84%'; 
        bluejayImage.style.left = '53%'; 
        bluejayImage.style.transform = 'translate(-50%, -50%)'; 

        document.body.appendChild(bluejayImage);
        }
    </script>

    <script>
        function showCarrotCake() {
        const carrotCakeImage = new Image();

        carrotCakeImage.src = "menuImages/carrotCake.png"; 

        // Adding style to Carrot Cake (yummy)
        carrotCakeImage.style.width = '6%';
        carrotCakeImage.style.height = '11%'; 
        carrotCakeImage.style.position = 'absolute';
        carrotCakeImage.style.top = '85%'; 
        carrotCakeImage.style.left = '58.5%'; 
        carrotCakeImage.style.transform = 'translate(-50%, -50%)'; 

        document.body.appendChild(carrotCakeImage);
        }
    </script>

    <script>
        function showTruman() {
        const trumanImage = new Image();

        trumanImage.src = "menuImages/truman.png"; 

        // Adding style to Truman 
        trumanImage.style.width = '6%';
        trumanImage.style.height = '9%'; 
        trumanImage.style.position = 'absolute';
        trumanImage.style.top = '85%'; 
        trumanImage.style.left = '47.5%'; 
        trumanImage.style.transform = 'translate(-50%, -50%)'; 

        document.body.appendChild(trumanImage);
        }
    </script>

    <script>
        function showChocolate() {
        const chocolateImage = new Image();

        chocolateImage.src = "menuImages/chocolate.png"; 

        // Adding style to Chocolate 
        chocolateImage.style.width = '5%';
        chocolateImage.style.height = '10%'; 
        chocolateImage.style.position = 'absolute';
        chocolateImage.style.top = '84%'; 
        chocolateImage.style.left = '42%'; 
        chocolateImage.style.transform = 'translate(-50%, -50%)'; 

        document.body.appendChild(chocolateImage);
        }
    </script>

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