<?php
$pageName = "Brian Duva's Webpage";
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
            <div class="bio-title">Brian Duva</div>
            <br>
            <div id="bio"> Brian Duva is majoring in Computer Science with a concentration in Data Science, as well as a major in Math. He intends to graduate in 2027.
        </section>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ?si=ucv0b7iMMuVtWzmb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </main>
</body>
<?php
     require "../../includes/footer.php";
?>