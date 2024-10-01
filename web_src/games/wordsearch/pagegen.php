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
    
    <!-- Script Code -->
    <script src="timer.js"></script>

    <!-- Clock Font: from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

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
        <div id="timerBox">
            <span id="timer" width="100px">7:00</span>
        </div>
        <break>
        <h6>Word Search</h6>
            <p>How many words can you find in the time limit?</p>
        
        <ul>
        <div class="container"> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

<div class="row justify-content-center"> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">1</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">2</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">3</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">4</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">5</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">6</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

     <button type="button" class="btn btn-outline-primary">7</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">8</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">9</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">10</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">11</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">12</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">13</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">14</button> 

  </div> 

  <div class="col-auto p-0"> 

    <!-- To hold what letter will be placed in this box. --> 

    <button type="button" class="btn btn-outline-primary">15</button> 

  </div> 

</div> 

</div> 

      </ul> 

</body> 

</html> 

