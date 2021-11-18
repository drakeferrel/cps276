<?php
require_once 'classes/Date_time.php'; 
$dt = new Date_time(); 
$notes = $dt->checkSubmit(); 
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
				<h1>Add Notes</h1>
				<p><a href ="assignment8display.php">Display Notes</a><br><br><?php echo $dt->notification; ?></p>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="dateTime">Date and Time</label>
							<input type="datetime-local" class="form-control" id="dateTime" name="dateTime"> 
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="note">Note</label>
							<textarea style="height: 500px;" class="form-control" id="note" name="note"></textarea>
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-2">
						<div class="row">
							<button type="submit" class="btn btn-primary p-2" name="buttonaction" value="submit">Add Note</button>
						</div>
					</div>
				</div>
				
			</form>
		</div>
	</body>
</html>