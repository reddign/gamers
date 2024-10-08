<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Trivia Settings</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script>
        // This is for form submissions
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("add-question");
            const message = document.getElementById("response");
            const input = form.querySelector("input[name='question']");
            const answerInput1 = form.querySelector("input[name='answer1']");
            const answerInput2 = form.querySelector("input[name='answer2']");
            const answerInput3 = form.querySelector("input[name='answer3']");

            updateQuestionList();

            form.addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(form);

               
                fetch(form.getAttribute("action"), {
                    method: "POST", body: formData
                }).then(response => response.json())
                .then(data => {message.textContent = data.message; message2.textContent = ''; input.value = ''; // Sets message and clears text field
                    answerInput1.value = ''; answerInput2.value = ''; answerInput3.value = '';
                    message.style.color = data.status === "success" ? "green" : "red"; // Changes color if successful
                    updateQuestionList();
                    console.log("here");
                }).catch(error => { // Error
                    
                    console.log("here with form action of " + form.getAttribute("action"));
                    console.log("here with response of " + new XMLSerializer().serializeToString(response));
                    message.textContext = "An error occurred.";
                    message.style.color = "red";
                    
                });
            });

            const form2 = document.getElementById("delete-question");
            const message2 = document.getElementById("response2");
            const input2 = form2.querySelector("input[name='questionID']");

            form2.addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(form2);

                fetch(form2.getAttribute("action"), {
                    method: "POST", body: formData
                }).then(response => response.json())
                .then(data => {message2.textContent = data.message; message.textContent = ''; input2.value = ''; // data.<message> comes from php
                    message2.style.color = data.status === "success" ? "green" : "red"; // data.<status> comes from php
                    updateQuestionList();
                }). catch(error => {
                    message2.textContext = "An error occurred.";
                    message2.style.color = "red";
                });
            });
            function updateQuestionList() {
                const wordList = document.getElementById("question-list");
                fetch('../../data_src/api/trivia/read.php', {method: 'get'}) // TODO: Change file path for FTP
                    .then(response => response.json())
                    .then(data => {wordList.innerHTML = data.join('<br>');}).catch(console.error);
            }
            updateQuestionList();
            
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
                    <li class="nav-item">
                        <div class="subnav">
                        <a class="nav-link" href="settings.php">
                        <i class="fas fa-cog"></i>Settings<button class="subnavbtn"></button>
                            <div class="subnav-content">
                                <a href="triviaSettings.php">Trivia Settings </a>
                                <a href="hangmanSettings.php">Hangman Settings </a>
                                <a href="userUpdate.php">User Info </a>
                                <a href="visitStats/visits.php">Visit Stats </a>
                            </div>
                        </div>
                        </a>
                    </li>
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
        <section id="settingsHome">
            <br>
            <div id="welcome-text">Welcome to our Main Settings Page!</div>
    </main>
    <footer>
        <?php
        require_once "../includes/footer.php";
        ?>
    </footer>

</body>
</html>