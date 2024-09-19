<?php
require_once "../../data_src/api/includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}

//SQL query
$sql = $connection->prepare("SELECT DISTINCT game_played FROM highscores;");
$sql->execute();
$result = $sql->get_result();

//If there are results
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo /* Add data */;
    }
  } 
  //If there has been no scores set
  else{
    echo "0 results";
  }
  $conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">    
</head>
<body>
        <label>Select a Game</label>
        <select name="Game">
            <?php 
                // use a while loop to fetch data 
                // from the $all_categories variable 
                // and individually display as an option
                while ($category = mysqli_fetch_array(
                        $all_categories,MYSQLI_ASSOC)):; 
            ?>
                <option value="<?php echo $category["Category_ID"];
                    // The value we usually set is the primary key
                ?>">
                    <?php echo $category["Category_Name"];
                        // To show the category name to the user
                    ?>
                </option>
            <?php 
                endwhile; 
                // While loop must be terminated
            ?>
        </select>
        <br>
    <br>
</body>
</html>