<?php
$output = "<table>";
$tableRows = 15;
$tableCells = 5;

for ($i = 1; $i < $tableRows + 1; $i++) {
	$output .= "<tr>";
	
	for($y = 1; $y < $tableCells + 1; $y++) {
		$output .= "<td> Row " . $i . " Cell " . $y . "</td>";
	}
	
	$output .= "</tr>";
}

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Assignment 2 Exercise 3</title>
		
		<style>
			table, th, td {
			  border: 1px solid black;
			}
		</style>
	</head>
	<body>
		<p><?php echo $output?></p>
	</body>
</html>