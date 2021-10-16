<?php

$output = "";

if(count($_POST) > 0) {
	require_once 'addNameProc.php';
	$addName = new AddNamesProc();
	$output = $addName->addClearNames();
}

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

		<title>Assignment 4</title>
	</head>
	<body>
		<div class="container p-2">
			<form action="#" method="post">
				<h1>Add Names</h1>
				
				<div class="row">
					<div class="col-2">
						<div class="row">
							<button type="submit" class="btn btn-primary p-2" name="buttonaction" value="add">Add Names</button>
						</div>
					</div>
					
					<div class="col-2">
						<div class="row">
							<button type="submit" class="btn btn-primary p-2" name="buttonaction" value="clear">Clear Names</button>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-10">
						<div class="row">
							<label for="entername">Enter Name</label>
							<input type="text" class="form-control" id="entername" name="entername">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-10">
						<div class="row">
							<label for="namelist">List of Names</label>
							<textarea style="height: 500px;" class="form-control" id="namelist" name="namelist"><?php echo $output ?></textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>