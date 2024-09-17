<?php
require_once "../../data_src/api/includes/db_config.php";
session_start();

// Create database connection
$connection = new mysqli($host, $dbUsername, $dbPassword, $database);

if($connection->connect_error) {
    die("Connection failed: ".$connection->connect_error);
}
$result = $mysqli->query("SELECT game_name FROM departments");
?>

<select name="games" id="games">
<option value="0" selected="selected">This</option>
<option value="0">Is</option>
<option value="0">Just</option>
<option value="0">A</option>
<option value="0">Test</option>
<?php
/*
while($rows = $result->fetch_assoc()){
  $game_name = $rows['game_name'];
  echo "<option value='$game_name'>$game_name</option>";
}
*/

?>