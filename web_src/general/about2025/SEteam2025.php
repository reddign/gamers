<?php
$pageName = "SE 2024 Webpage";
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

        <div id="welcome-text">THE 2025 SOFTWARE ENGINEERING TEAM</div>
        <br>
        <div class="section"> A Multiplayer Chess Game was added by the Fall 2025 Software Engineering class. To find out 
            more about the students that took this project on check out their pages below.<BR></div>
        <br>
        <div class="pfp">
            <img id="Team2025Pic" src="../teampics/SEteam2025.png" alt="2024 Team to Come picture." width=1000 usemap="#classmap">
            <map id="classmap">
                <area shape="circle" coords="225,83,20" href="student_template.php">
            </map>    
        </div>

        <div class="section" id="team-names">
            <!-- <span class="name">From Left to Right: </span>  -->
            <span class="name">
                , and <a href='student_template.php'>Jane Doe</a>, 
                and Prof Reddig
            </span>
        </div>
    </div>
	<?php
    require "../../includes/footer.php";
    ?>
</body>

</html>
