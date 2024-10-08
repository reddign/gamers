
<?php
$pageName = "Trivia Questions page";
//Extra files to be loaded by head.php
$jsFiles = ["trivia.js"];
$cssFiles = ["trivia.css"];

require "../includes/functions.php";
require "../includes/head.php";
//Nancy was here
?>
<body>
<?php
     require "../includes/navbar.php";
?>

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
<?
require "../includes/footer.php";
?>
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