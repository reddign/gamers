<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Word Search</title>
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
        <h1>Welcome to Jay to Z!</h1>
        <p>Please select Categories before starting</p>
    <form action="pagegen.php" method="post"> <!-- Calls pagegen.php when form is submitted. -->
    
    <!-- TODO: Implement Difficulties -->
    <div class="container" id="Difficulty"> <!-- Created to implement different difficulties, currently hidden-->
        <h3 class="formHeader">Difficulty</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Diff" id="easyDiff" value="easy">
            <label class="form-check-label" for="easyDiff">
            Easy
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Diff" id="normalDiff" value="normal">
            <label class="form-check-label" for="normalDiff">
            Normal
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Diff" id="hardDiff" value="hard">
            <label class="form-check-label" for="hardDiff">
            Hard
            </label>
        </div>
    </div>
    <br>
    <div class="container">
        

    </div>
    <div class="container">

        <h3 class="formHeader">Category</h3>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="dormsCat" value="DORMS" name="Cat1">
            <label class="form-check-label" for="dormsCat">Dorms</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="toolsCat" value="TOOLS" name="Cat2">
            <label class="form-check-label" for="toolsCat">Tools</label>
        </div>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="expertiseCat" value="EXPERTISE" name="Cat3">
            <label class="form-check-label" for="expertiseCat">Expertise</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="languagesCat" value="LANGUAGES" name="Cat4">
            <label class="form-check-label" for="languagesCat">Languages</label>
        </div>
    </div>
    <br>

    <input class="btn btn-primary btn-lg" type="submit" id="start" value="Start">
    </form>
    <br>
    <!--
    TODO: Add functionallity to the random button, which is now hidden
                    -->
    <input type="button" class="btn btn-secondary btn-lg" id="rand" onclick="location.href='pagegen.php';" value="Random">
    
    </main>
</body>
</html>