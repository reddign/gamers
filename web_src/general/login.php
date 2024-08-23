<?php
session_start()
?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg navbar bg-blue">
            <a class="navbar-brand" href="index.php">
                <img id="logo" src="../includes/images/logo.png" alt="Logo" width='100px.'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
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
                            <a class="hidden" href="settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../games/menu.php">
                            <i class="fas fa-gamepad"></i> Games
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <br>
    <section id="login">
        <div id="welcome-text">Login</div>
        <br><br>
        <div id="basicContainer">
            <!-- Form to get login info from admin -->
            <form action="../../data_src/api/admin/read.php" method="post" style="text-align: left">
                <label for="username"><b>Username: </b></label>
                <input type="text" placeholder="Enter Username" name="username" id="username" required>

                <label for="password"><b>Password: </b></label>
                <input type="password" placeholder="Enter Password" name="password" id="password" required>

                <input type ="submit" value="Login">
            </form>
            
            <!-- Register button for if not already an admin -->
            <a class="nav-link" href="register.php">
                <i class="fas fa-key"></i> Register
            </a>
        </div>
        </section>
</body>
</html>
