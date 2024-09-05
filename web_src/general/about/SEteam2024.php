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
                <area shape="circle" coords="873,154,10" href="matthew_smith.php">
                <area shape="circle" coords="188,138,10" href="Joshua_Stoner.php">
                <area shape="circle" coords="700,145,10" href="Brian_Duva.php">
                <area shape="circle" coords="430,133,10" href="Joshua_Schmitt.php">
                <area shape="circle" coords="225,83,20" href="student_template.php">
                <area shape="circle" coords="573,140,10" href="muzahidul_islam.php">
                <area shape="circle" coords="515,145,10" href="OwenWertzberger.php">
                <area shape="circle" coords="800,153,10" href="kevin_barbieri.php">
                <area shape="circle" coords="610,139,10" href="James_Hutchins.php">
                <area shape="circle" coords="157,112,10" href="leif_hoffman.php">
                <area shape="circle" coords="490,150,10" href="cameron_hollabaugh.php">
                
            </map>    
        </div>

        <div class="section" id="team-names">
            <!-- <span class="name">From Left to Right: </span>  -->
            <span class="name">
                Kevin Barbieri, Joseph Culkin, Brian Duva, Parker Engle,
                Leif Hoffman, Cameron Hollabaugh, Laney Humble, James Hutchins,
                <a href='muzahidul_islam.php'>Muzahidul Islam</a>, <a href='vincent_liu.php'>Vincent Liu</a>, John McGovern, Jackson Miller,
                Mildred Nwachukwu-Innocent, Martin Ratchford, Alexander Roop, Wesley Ryan,
                Joshua Schmitt, Ian Skeete, Austin Smith, Matthew Smith,
                Tyler Souders, Joshua Stoner, Camila Torres, Joey Wagner,
                Asher Wayde, <a href='OwenWertzberger.php'>Owen Wertzberger</a>, <a href='owen_yang.php'>Owen Yang</a>, and <a href='student_template.php'>Jane Doe</a>
            </span>
        </div>
    </div>
    <?php
    require "../../includes/footer.php";
    ?>
</body>

</html>