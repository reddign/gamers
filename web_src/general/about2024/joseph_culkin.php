<?php
$pageName = "Joseph Culkin's Webpage";
require "../../includes/functions.php";
require "../../includes/head.php";

?>
<body>
<?php
     require "../../includes/navbar.php";
    $x=0;
     while($x<10){
        $x++;
     }
     echo $x;
     $ExtraVar=0;
     $Expendable=3.14595;
     $Product=$ExtraVar+$Expendable*4;
     
?>
   
    <div class="buttons">
        <a href="SEteam2024.php"><button class="button button2">Go Back!</button></a> 
    </div>
        
    <main>
        <section id="Joseph Culkin's Bio">
            <div class="bio-title">Jospeh Culkin</div>
            <br>
            <div id="bio"> Joseph Culkin 
                Majoring in Engineering, with a concentration in Computer  Engineering, and intends to graduate in 2025.
        </section>
    </main>
</body>
<?php
     require "../../includes/footer.php";
?>