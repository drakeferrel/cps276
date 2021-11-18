<?php

require_once 'classes/PdoMethods.php';
date_default_timezone_set('America/Detroit');

class Date_time {
	public $notification = "";
	
	public function checkSubmit() {
		if(count($_POST) > 1) {
			$d = new DateTime($_POST['dateTime']);
			
			$pdo = new PdoMethods();
			$sql = "INSERT INTO notes (note_time, note_text) VALUES (:notetime,:notetext)";
			
			$bindings = [
				[':notetime',$d->getTimestamp(),'int'],
				[':notetext',$_POST['note'],'str']
			];
			
			$result = $pdo->otherBinded($sql, $bindings);
			
			// Notification
			if($result == 'error') {
				$this->notification = "<br><br>Error adding note<br><br>";
			} else {
				$this->notification = "<br><br>Note has been added<br><br>";
			}
		}
	}
	
	public function getNotesBetweenDates() {
		if(count($_POST) > 1) {
			$pdo = new PdoMethods();
			
			$begDate = new DateTime($_POST['begDate']);
			$endDate = new DateTime($_POST['endDate']);
			
			$sql = "SELECT * FROM notes WHERE (note_time >= " . $begDate->getTimestamp() . " AND note_time <= " . $endDate->getTimestamp() .") ORDER BY note_time DESC";
			$records = $pdo->selectNotBinded($sql);
			
			/* IF THERE WAS AN ERROR DISPLAY MESSAGE */
			if($records == 'error'){
				return 'There has been and error processing your request';
			}
			else {
				if(count($records) != 0){
					$output = "<table class='table table-bordered table-striped'><thead><tr>";
					$output .= "<th>Date and Time</th><th>Note</th>";
					foreach($records as $row) {
						$displayDate = new DateTime();
						$displayDate->setTimestamp($row['note_time']);
						$output .= "<tr><td>" . $displayDate->format('n/d/Y h:i a') . "</td><td>" . $row['note_text'] . "</td></tr>";
					}
					
					$output .= "</table>";
					
					return $output;
				}
				else {
					return 'No files found';
				}
			}
		} else return "";
	}
}

?>