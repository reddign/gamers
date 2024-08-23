<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Recent Users</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script>
        // This is for form submissions
        document.addEventListener("DOMContentLoaded", function() {
            function updateUsers() {
                const table = document.getElementById("userTable");
                fetch('../../data_src/api/user/list.php', {method: 'get'}) // TODO: Change file path for FTP
                    .then(response => response.json())
                    .then(data => {
                        // Clear
                        table.innerHTML = '';

                        // Table header
                        const headerRow = table.insertRow();
                        const headerCell1 = headerRow.insertCell(0);
                        const headerCell2 = headerRow.insertCell(1);
                        const headerCell3 = headerRow.insertCell(2);
                        headerCell1.textContent = 'First Name';
                        headerCell2.textContent = 'Email';
                        headerCell3.textContent = 'Date';

                        data.forEach(user => {
                            const userData = user.split(' ');

                            // Join the parts of the user's name if it contains spaces
                            const firstName = userData.slice(0, -2).join(' '); // Excludes last 2 elements (email, date)
                            const email = userData[userData.length - 2];
                            const date = userData[userData.length - 1];

                            // Create a new row for each user
                            const row = table.insertRow();
                            const cell1 = row.insertCell(0);
                            const cell2 = row.insertCell(1);
                            const cell3 = row.insertCell(2);

                            // Set cell values
                            cell1.textContent = firstName;
                            cell2.textContent = email;
                            cell3.textContent = date;
                        });
                    }).catch(console.error);
                }
            updateUsers();
        });
    </script>

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
                <div id="welcome-text">User Visits In the Last 3 Months</div>
            </div> 
            <br>
            <div id="users">
                <table id="userTable" class="table">

                </table>
            </div>
        </section>
    </main>
</body>
</html>
