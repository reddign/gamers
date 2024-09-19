<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar bg-blue">
            <a class="navbar-brand" href="https://etown.edu/">
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
                    <!-- Checking whether to display login or logout button. -->
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section id="user-sec">
            <br>
            <div id="text">
                <h2 style="text-align:center">User</h2>
            </div>
            
            <br>

            <div>
                <div id="basicContainer">
                <form action="../../data_src/api/user/create.php" method="post" id="add-user" style="text-align: left">

                    <label for="username">Enter your <b>Username:</b></label>
                    <input type="text" id= "username" name="user" required> <br><br>

                    <label for="email">Enter your <b>Email:</b></label>
                    <input type="text" id="email" name="email" required> <br><br>

                    <label for="name">Enter your <b>Name:</b></label>
                    <input type="text" id="name" name="first" required> <br><br>

                    <input type="submit" value="Submit">
                </form>
                </div>
            </div>
        </section>
    </main>

</body>
</html>
