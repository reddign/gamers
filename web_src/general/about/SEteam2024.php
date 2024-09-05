<?php
$pageName = "Jane Doe's Webpage";
require "../../includes/functions.php";
require "../../includes/head.php";

?>

<body>
    <?php
    require "../../includes/navbar.php";
    ?>
    <div class="buttons">
        <a href="../about.php"><button class="button button2">Go Back!</button></a>
    </div>

    <div class="team-section">

        <div id="welcome-text">THE 2024 SOFTWARE ENGINEERING TEAM</div>
        <br>
        <div class="section"> This project was taken on and continued by the Fall 2024 Software Engineering class. <BR></div>
        <br>
        <div class="pfp">
            <img id="Team2024Pic" src="../teampics/SEteam2024_A.png" alt="2024 Team to Come picture." width=1000 usemap="#classmap">
            <map id="classmap">
                <area shape="circle" coords="225,83,20" href="student_template.php">
                <area shape="circle" coords="573,140,10" href="muzahidul_islam.php">
                <area shape="circle" coords="515,145,10" href="OwenWertzberger.php">
                <area shape="circle" coords="800,153,10" href="kevin_barbieri.php">
                <area shape="circle" coords="610,139,10" href="James_Hutchins.php">
                <area shape="circle" coords="157,112,10" href="leif_hoffman.php">
                <area shape="circle" coords="500,200,10" href="cameron_hollabaugh.php">

            </map>    
        </div>

        <div class="section" id="team-names">
            <!-- <span class="name">From Left to Right: </span>  -->
            <span class="name">
                <a href="kevin_barbieri.php">Kevin Barbieri</a>, <a href="joseph_culkin.php">Joseph Culkin, <a href="Brian_Duva.php">Brian Duva</a>,<a href="ParkerEngle.php">Parker Engle</a>,
                <a href="leif_hoffman.php">Leif Hoffman</a>, <a href="cameron_hollabaugh.php">Cameron Hollabaugh</a>, <a href="laney_humble.php">Laney Humble</a>, <a href="James_Hutchins.php">James Hutchins</a>,
                <a href='muzahidul_islam.php'>Muzahidul Islam</a>, <a href='vincent_liu.php'>Vincent Liu</a>, <a href="john_mcgovern.php">John McGovern</a>, <a href="Jackson_Miller.php">Jackson Miller</a>,
                <a href='MildredNwachukwu.php'>Mildred Nwachukwu-Innocent</a>, <a href='MartinRatchford.php'>Martin Ratchford</a>, <a href='AlexRoop.php'> Alexander Roop </a>, Wesley Ryan, <a href='Joshua_Schmitt.php'> Joshua Schmitt </a>, <a href="Ian_Skeete.php">Ian Skeete</a> , <a href='austin_smith.php'>Austin Smith</a>, <a href='matthew_smith.php'>Matthew Smith,
                <a href='Tyler_Souders.php'>Tyler Souders</a>, Joshua Stoner, <a href='camila_torres.php'>Camila Torres</a>, <a href='joey_wagner.php'>Joey Wagner</a>,
                <a href='Asher_Wayde.php'>Asher Wayde</a>, <a href='OwenWertzberger.php'>Owen Wertzberger</a>, <a href='owen_yang.php'>Owen Yang</a>, and <a href='student_template.php'>Jane Doe</a>, 
                and <a href='Prof_reddig.php'>Prof Reddig</a>
            </span>
        </div>
    </div>
    <?php
    require "../../includes/footer.php";
    ?>
</body>

</html>
