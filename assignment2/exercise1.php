<?php
$output = "<ul>";

for ($i = 1; $i < 5; $i++) {
	$output .= "<li>" . $i . "</li><ul>";
	
	for($y = 1; $y < 6; $y++) {
		$output .= "<li>" . $y . "</li>";
	}
	
	$output .= "</ul>";
}

$output .= "</ul>";

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Assignment 2 Exercise 1</title>
	</head>
	<body>
		<p><?php echo $output?></p>
	</body>
</html>