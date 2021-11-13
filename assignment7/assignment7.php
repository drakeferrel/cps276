<?php

$notification = "";

if(count($_POST) > 0) {
	require_once 'fileUploadProc.php';
	$fileUploader = new FileUploader();
	$fileUploader->ProcessPost();
	$notification = $fileUploader->notification;
}

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<title>Assignment 7</title>
	</head>
	<body>
		<div class="container p-2">
			<form action="#" method="post" enctype="multipart/form-data">
				<h1>File Upload</h1>
				<p><a href ="assignment7list.php">Show File List</a><br><br><?php echo $notification;?></p>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<label for="filename">File Name</label>
							<input type="text" class="form-control" id="filename" name="filename">
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-12">
						<div class="row">
							<input type="file" id="fileupload" name="fileupload">
						</div>
					</div>
				</div>
				
				<br>
				
				<div class="row">
					<div class="col-2">
						<div class="row">
							<button type="submit" class="btn btn-primary p-2" name="buttonaction" value="upload">Upload</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>