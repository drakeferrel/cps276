<?php

class Directories {
	public $notification = "";
	
	public function ProcessPost() {
		if($_POST['foldername']!='') {
			$requestedDirectory = "directories/".$_POST['foldername'];
			
			// Check if requested directory exists, and if it does, alert user and cancel operation
			if(is_dir($requestedDirectory)) {
				$this->notification = "<br><br>A directory already exists with that name.<br><br>";
			} else {
				// Create directory
				mkdir($requestedDirectory,0777);
				
				// Write "readme.txt" and add written file input
				$newfile = fopen($requestedDirectory."/readme.txt","w");
				fwrite($newfile, $_POST['filecontent']);
				fclose($newfile);
				
				$requestedDirectory .= "/readme.txt";
				
				$this->notification = "<br><br>File and directory were created<br><br><a href=\"" . $requestedDirectory . "\">" . $requestedDirectory ."</a>";
			}
		}
	}
}

?>