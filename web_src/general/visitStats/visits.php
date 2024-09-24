<?php
    session_start();

    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $database = "triviagames";

    $connection = new mysqli($host, $dbUsername, $dbPassword, $database);

    require "../../includes/functions.php";
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visits Stats</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" type="text/css" href="<?PHP echo url(); ?>/stylesheets/index.css">
    <link rel="stylesheet" type="text/css" href="<?PHP echo url(); ?>/stylesheets/about.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>
<body>
    <!-- Page Navbar -->
    <?php
     require "../../includes/navbar.php";
    ?>
<section id="main_body">
    <h1 id="nameOfPage">Visit Statistics</h1>

    <?php
    $sql = "SELECT visitor, COUNT(*) AS visit_count FROM visit GROUP BY visitor";
    $result = $connection->query($sql);

    // List of visitors
    $visitOnce = [];
    $visit2To5 = [];
    $visit6Plus =[];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $visitCount = $row['visit_count'];  // Updated from $visitNum to $visitCount
            $visitor = $row['visitor'];

            if ($visitCount == 1) {
                $visitOnce[] = $visitor;
            } else if ($visitCount >= 2 && $visitCount <= 5) {
                $visit2To5[] = $visitor;
            } else if ($visitCount >= 6) {
                $visit6Plus[] = $visitor;
            }
        }
    }
    ?>
    <section id="table">
        <table border="1" id="main_table">
            <tr class="tr">
                <th># Visited Once</th>
                <th># Visited 2-5 Times</th>
                <th># Visited 6+ Times</th>
            </tr>
            <tr class="tr">
                <td>
                    <?php
                    if (!empty($visitOnce)) {
                        echo implode('<br>', $visitOnce);
                    } else {
                        echo "Loading...";
                    }

                    ?>
                </td>

                <td>
                    <?php
                    if (!empty($visit2To5)) {
                        echo implode('<br>', $visit2To5);
                    } else {
                        echo "Loading...";
                    }

                    ?>
                </td>

                <td>
                    <?php
                    if (!empty($visit6Plus)) {
                        echo implode('<br>', $visit6Plus);
                    } else {
                        echo "Loading...";
                    }

                    ?>
                </td>
            </tr>
        </table>
    </section>
    </section>
    <!-- putting the footer at the bottom of the page -->
   <br><br><br><br><br><br><br><br><br>
</body>

    <!-- Page Footer -->
    <?php
     require "../../includes/footer.php";
    ?>

    <!-- close connection -->
    <?php
    $connection->close();
    ?>
</html>
