<?php
session_start()
?>

<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width =device-width, initial-scale=1.0">
    <title>Monthly User Visits</title>
    <link rel="stylesheet" href = "style.css">
</head>
<body>
    <h1> Monthly Visits Statistics</h1>
    <table border = "1">
        <tr>
            <th>Month</th>
            <th>Number of Visitors</th>
        </tr>
        <br>
        <br>
        <br>
        <h2>Monthly Visits by Graph</h2>
        <br>
        <br>
        <br>
        <h2>Monthly Visits Table<h2>
<?php
// TODO: Connect to the database
// example connection: $conn = new mysqli("localhost", "username", "password", "database");

// Check the connection using the following...
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }


//TODO: Write a SQL query to grab the data for number of users per month
// LIKE $sql = "SELECT MONTH(visit_date) AS month, COUNT(user_id) AS num_visits FROM visits GROUP BY MONTH(visit_date)";
// $result = $conn->query($sql);


// TODO: Write a loop to go through the results and display them in the table
// if any results were returnes, we loop through each row in result set
// then we print each row in the new row in the table
// else, if no reults were found we can display an error



// TODO: Close database connection
// $conn->close();
?>
    </table>
</body>
</html

<?php
 //trial table, needs to be adjusted
$dataPoints1 = array(
	array("label"=> "2010", "y"=> 36.12),
	array("label"=> "2011", "y"=> 34.87),
	array("label"=> "2012", "y"=> 40.30),
	array("label"=> "2013", "y"=> 35.30),
	array("label"=> "2014", "y"=> 39.50),
	array("label"=> "2015", "y"=> 50.82),
	array("label"=> "2016", "y"=> 74.70)
);
$dataPoints2 = array(
	array("label"=> "2010", "y"=> 64.61),
	array("label"=> "2011", "y"=> 70.55),
	array("label"=> "2012", "y"=> 72.50),
	array("label"=> "2013", "y"=> 81.30),
	array("label"=> "2014", "y"=> 63.60),
	array("label"=> "2015", "y"=> 69.38),
	array("label"=> "2016", "y"=> 98.70)
);

?>
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Monthly Visits by Etown User"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Etown User",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Non-Etown User",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>                 