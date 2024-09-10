<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script>
        // This is for form submissions
        document.addEventListener("DOMContentLoaded", function() { // Runs when doc loads
            const form = document.getElementById("add-word"); // Reference to HTML element add-word
            const message = document.getElementById("response"); // Reference to div
            const input = form.querySelector("input[name='word']"); // Reference to input element where user enters word

            form.addEventListener("submit", function(e) { // Listens for submit button
                e.preventDefault(); // Prevents page from reloading to create.php?
                const formData = new FormData(form); // Access to the form data, to send AJAX request

               
                fetch(form.getAttribute("action"), { // Makes HTTP request
                    method: "POST", body: formData // Sends POST request with form data
                }).then(response => response.json()) // then expects response in JSON format
                .then(data => {message.textContent = data.message; message2.textContent = ''; input.value = ''; // Sets message and clears text field
                    message.style.color = data.status === "success" ? "green" : "red"; // Changes color if successful
                    updateWordList();
                    console.log("here");
                }).catch(error => { // Error
                    
                    console.log("here with form action of " + form.getAttribute("action"));
                    console.log("here with response of " + new XMLSerializer().serializeToString(response));
                    message.textContext = "An error occurred.";
                    message.style.color = "red";
                    
                });
            });

            const form2 = document.getElementById("delete-word");
            const message2 = document.getElementById("response2");
            const input2 = form2.querySelector("input[name='word']");

            form2.addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(form2);

                fetch(form2.getAttribute("action"), {
                    method: "POST", body: formData
                }).then(response => response.json())
                .then(data => {message2.textContent = data.message; message.textContent = ''; input2.value = ''; // data.<message> comes from php
                    message2.style.color = data.status === "success" ? "green" : "red"; // data.<status> comes from php
                    updateWordList();
                }). catch(error => {
                    message2.textContext = "An error occurred.";
                    message2.style.color = "red";
                });
            });
            function updateWordList() {
                const wordList = document.getElementById("word-list");
                fetch('../../data_src/api/hangman/list.php', {method: 'get'}) // TODO: Change file path for FTP
                    .then(response => response.json())
                    .then(data => {wordList.innerHTML = data.join('<br>');}).catch(console.error);
            }
            // updateWordList();

        });

        function updateWordList() {
                const wordList = document.getElementById("word-list");
                fetch('../../data_src/api/hangman/list.php', {method: 'get'}) // TODO: Change file path for FTP
                    .then(response => response.json())
                    .then(data => {wordList.innerHTML = data.join('<br>');}).catch(console.error);
        }

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
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!--
    <section id="sub-settings">
        <ul class="sub-nav">
            <div class="sub-nav-items">
                <li><a href="settings.php">Hangman</a></li>
                <li><a href="trivia.php">Trivia</a></li>
            </div>
        </ul>
    </section>
    -->

    <main>
        <section id="game">
            <br>
            <div id="welcome-text">Hangman Settings</div>
            <div id= "basicContainer">
            
            <form action="../../data_src/api/hangman/create.php" method="post" id="add-word" style="text-align: left">
            &nbspAdd A Word: <input type="text" name="word"><br>
            &nbsp<input type="submit" value="Submit">
                <div id="response"></div>
            </form>
            <br>
            <form action="../../data_src/api/hangman/delete.php" method="post" id="delete-word" style="text-align: left">
            &nbspDelete A Word: <input type="text" name="word"><br>
            &nbsp<input type="submit" value="Submit">
                <div id="response2"></div>
            </form>
            <br>
            <div id="word-list">
                <button type="button" onclick="updateWordList()">Show word list</button>
            </div>
            <br>
            <div id="hide-button"> 
                <button onClick="window.location.reload();">Hide word list</button>
            </div>
    </div>

        </section>
    </main>
</body>
</html>