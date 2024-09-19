<?php
session_start();
// need to access the db config file here instead of this
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$database = "triviagames";


// make a connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);
?>

<!DOCTYPE html>
<html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visits Stats</title>
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    <h1>Visit Statistics</h1>

    <?php

    $sql = "SELECT visitor, COUNT(*) AS visit_count FROM visit GROUP BY visitor";
    $result = $connection->query($sql);

    // List of visitors
    $visitOnce = [];
    $visitTwoFive = [];
    $visitSixPlus =[];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $visitNum = $row['visit_count'];
            $visitor = $row['visitor'];

            if ($visitCount == 1) {
                $visitedOnce[] = $visitor;
            } else if ($visitCount >= 2 && $visitCount <= 5) {
                $visited2To5[] = $visitor;
            } else if ($visitCount >= 6) {
                $visited6Plus[] = $visitor;
            }
        }
    }


    ?>

    <table border="1">
        <tr>
            <th># Visited Once</th>
            <th># Visited 2-5 Times</th>
            <th># Visited 6+ Times</th>
        </tr>
        <tr>
            <td>
                <?php
                if (!empty($visitedOnce)) {
                    echo implode ('<br>', $visitedOnce);
                } else {
                    echo "Loading...";
                }

                ?>
            </td>

            <td>
                <?php
                if (!empty($visited2To5)) {
                    echo implode ('<br>', $visited2To5);
                } else {
                    echo "Loading...";
                }

                ?>
            </td>

            <td>
                <?php
                if (!empty($visited6Plus)) {
                    echo implode ('<br>', $visited6Plus);
                } else {
                    echo "Loading...";
                }

                ?>
            </td>

        </tr>
    </table>

    <?php
    $connection->close();
    ?>
    
</body>
</html>
