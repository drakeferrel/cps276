<?php
require_once 'classes/Date_time.php'; 
$dt = new Date_time(); 
$notes = $dt->getNotesBetweenDates(); 
?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<title>Assignment 8</title>
	</head>
	<body>
		<div class="container p-2">
			<form action="#" method="post" enctype="multipart/form-data">
				<h1>Display Notes</h1>
				<p><a href ="assignment8.php">Add Note</a><br><br></p>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="begDate">Beginning Date</label>
							<input type="date" class="form-control" id="begDate" name="begDate">
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="endDate">Ending Date</label>
							<input type="date" class="form-control" id="endDate" name="endDate">
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-2">
						<div class="row">
							<button type="submit" class="btn btn-primary p-2" name="buttonaction" value="submit">Get Notes</button>
						</div>
					</div>
				</div>
				
				<br>
				
				<p><?php echo $notes; ?></p>
				
			</form>
		</div>
	</body>
</html>