<?php

class AddNamesProc {
	public $namelist = "";
	
	public function addClearNames() {
		if($_POST['buttonaction']=='clear')
			return "";
		else {
			$this->namelist = $_POST['namelist'];
			if($_POST['entername'] != "") {
				$newname = substr($_POST['entername'],strpos($_POST['entername']," ")+1) . ", " . substr($_POST['entername'],0,strpos($_POST['entername']," "));
				
				if($_POST['namelist'] == "") $this->namelist = $newname;
				else {
					$splitnames = preg_split("/\n/", $this->namelist);
					array_push($splitnames, $newname);
					sort($splitnames);
					$this->namelist = "";
					for($i = 0; $i < count($splitnames); $i++) {
						$this->namelist .= $splitnames[$i] . "\n";
					}
				}
			}
			
			return $this->namelist;
		}
	}
}

?>