<?php
session_start();
require_once "../../../web_src/games/wordsearch/mapGen.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>JayToZ</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/wordsearch.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- get function -->
    <?php
    // this grabs the form variables from POST
    $formVars=array();
        foreach ($_POST as $key => $value) {
            $formVars[]=$value;
        }
        // this gets the map with the formVars
        $results=generateMap(15,8,$formVars);
    //print_r($results[1]); //added for testing purposes
    ?>
    <!-- Script Code -->
    <script src="timer.js"></script>
    <script src="mapLogic.js"></script>

    <!-- Clock Font: from Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&display=swap" rel="stylesheet">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar bg-blue">
        <a class="navbar-brand" href="index.php">
            <img id="logo" src="../../includes/images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../general/index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="hidden" href="../../general/settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>
                <li class="nav-item">
                        <a class="nav-link" href="../../general/about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="../menu.php">
                        <i class="fas fa-gamepad"></i> Games
                    </a>
                </li>
                <!-- Checking whether to display login or logout button. -->
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
    
    <main>
        
        <h1 id='title'>Jay to Z</h1>
        <div id="timerBox">
            <span id="timer" width="100px" value="">7:00</span>
            <br>
            <span id="scoreLbl">score:</span>
            <span id="score" width="100px">0</span>
        </div>
        <break>
        <p>How many words can you find in the time limit?</p>

        
        <table style="margin:auto;display:inline-block;">
        <?php
        /*
                        BIG TODO:
                        Sometimes this game just times out in xampp, and kills MySQL.
        */
        $board=$results[0];
        // This generates the board with all of the buttons on it.
        for($i=0;$i<sizeof($board);$i++){
            echo "<tr class='row'>";
            for($j=0;$j<sizeof($board[$i]);$j++){
                $value="";
                $angle="";
                $posX="";
                $posY="";
                for($iter=0;$iter<sizeof($results[1]);$iter++){
                    // this is for adding values to the button that starts a word
                    if(($results[1][$iter]->start[0]==$i & $results[1][$iter]->start[1]==$j)){
                        $value= $results[1][$iter]->name;
                        $angle= $results[1][$iter]->angle;
                        $posX=  $results[1][$iter]->start[0];
                        $posY=  $results[1][$iter]->start[1];
                    }// this is the same, but for the end of the word
                    else if(($results[1][$iter]->end[0]==$i & $results[1][$iter]->end[1]==$j)){
                        $value= $results[1][$iter]->name;
                        $posX=  $results[1][$iter]->end[0];
                        $posY=  $results[1][$iter]->end[1];
                    }

                }
                echo "<td style='border:1px solid'><button class='letterButton' value='".$value."' angle='".$angle."' posX='".$posX."' posY='".$posY."'>".$board[$i][$j]."</button></td>";
            }
            echo "</tr>";
        }
        ?>
        </table>
        <ul id="wordbank">
            <?php
                // This Generates the word bank
                for($i=0;$i<sizeof($results[1]);$i++)
                    echo "<li class='wordBank' id='".$results[1][$i]->name."'>".$results[1][$i]->name."</li>";
                    
            ?>

        </ul>
        
        
</body> 

</html> 

