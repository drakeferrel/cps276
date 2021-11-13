<?php

require_once 'PdoMethods.php';

class FileList {
	public function ListFiles() {
		$pdo = new PdoMethods();
        
        $sql = "SELECT * FROM files";

        $records = $pdo->selectNotBinded($sql);

        /* IF THERE WAS AN ERROR DISPLAY MESSAGE */
        if($records == 'error'){
            return 'There has been and error processing your request';
        }
        else {
            if(count($records) != 0){
                return $this->makeList($records);	
            }
            else {
                return 'No files found';
            }
        }
	}
	
	private function makeList($records){
        $output = "<ul>";
		foreach ($records as $row){
            $output .= "<li><a target='_blank' href='files/{$row['file_address']}'>{$row['file_name']}</a></li> ";
		}
		
		$output .= "</ul>";
		return $output;
    }
}

?>