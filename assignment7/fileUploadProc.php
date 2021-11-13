<?php

require_once 'PdoMethods.php';

class FileUploader {
	public $notification = "";
	
	public function ProcessPost() {
		if($_FILES['fileupload']['type'] != 'application/pdf') {
			$this->notification = "<br><br>File must be a pdf file<br><br>";
		} else {
			if($_FILES['fileupload']['size'] < 100000) {
				// For each file in the "files" folder, check if its the same mime and size as uploaded file
				$allFiles = scandir('files');
				$foundMatchingFile = false;
				foreach($allFiles as $file) {
					if($foundMatchingFile == false) {
						if(filesize('files/'.$file) == $_FILES['fileupload']['size'] && mime_content_type('files/'.$file) == $_FILES['fileupload']['type']) {
							// If it is, create a database entry in dferrel Files with the inputted file name
							$pdo = new PdoMethods();
							$sql = "INSERT INTO files (file_name, file_address) VALUES (:filename,:fileaddress)";
							
							$bindings = [
								[':filename',$_POST['filename'],'str'],
								[':fileaddress',$file,'str']
							];
							
							$result = $pdo->otherBinded($sql, $bindings);
							
							// Notification
							if($result == 'error') {
								$this->notification = "<br><br>Error adding ".$_POST['filename']."<br><br>";
							} else {
								$this->notification = "<br><br>File has been added<br><br>";
								$foundMatchingFile = true;
							}
						}
					}
				}
				
				// Didn't upload one of the example files
				if($foundMatchingFile == false) {
					$this->notification = "<br><br>This file isn't compatible with any files on server</br></br>";
				}
			} else {
				$this->notification = "<br><br>File is too big<br><br>";
			}
		}
	}
}

?>