    <header>
    <nav class="navbar navbar-expand-lg navbar bg-blue">
            <a class="navbar-brand" href="<?PHP echo url(); ?>/general/index.php">
                <img id="logo" src="<?PHP echo url(); ?>/includes/images/logo.png" alt="Logo" width='100px.'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?PHP echo url(); ?>/general/index.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?PHP echo url(); ?>/settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="hidden" href="<?PHP echo url(); ?>/settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?PHP echo url(); ?>/general/about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?PHP echo url(); ?>/games/menu.php">
                            <i class="fas fa-gamepad"></i> Games
                        </a>
                    </li>
                    <!-- Checking whether to display login or logout button. -->
                    <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?PHP echo url(); ?>/logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?PHP echo url(); ?>/login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>