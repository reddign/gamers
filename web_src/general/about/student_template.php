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
        <a href="SEteam2024.php"><button class="button button2">Go Back!</button></a> 
    </div>
        
    <main>
        <section id="Jane Doe's Bio">
            <div class="bio-title">Jane Doe</div>
            <br>
            <div id="bio"> Jane Doe is not a student in this class. If she was she might be majoring in Computer Science, with a concentration in Web and Application 
                Design, plus a minor in Graphic Design, and intends to graduate in 2026.
        </section>
    </main>
</body>
<?php
     require "../../includes/footer.php";
?>