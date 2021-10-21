<?php

$notification = "";

if(count($_POST) > 0) {
	require_once 'directories.php';
	$directories = new Directories();
	$directories->ProcessPost();
	$notification = $directories->notification;
}

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<title>Assignment 5</title>
	</head>
	<body>
		<div class="container p-2">
			<form action="#" method="post">
				<h1>File and Directory Assignment</h1>
				<p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only. <?php echo $notification;?></p>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="foldername">Folder Name</label>
							<input type="text" class="form-control" id="foldername" name="foldername">
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="filecontent">File Content</label>
							<textarea style="height: 500px;" class="form-control" id="filecontent" name="filecontent"></textarea>
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-2">
						<div class="row">
							<button type="submit" class="btn btn-primary p-2" name="buttonaction" value="submit">Submit</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>