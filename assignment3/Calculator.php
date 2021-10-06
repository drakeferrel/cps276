<?php

class Calculator {
	public function calc($mode = null, $num1 = null, $num2 = null) {
		if(isset($mode) && isset($num1) && isset($num2)) {
			if(is_numeric($num1) && is_numeric($num2)) {
				switch ($mode) {
					case "+":
						echo "The sum of the numbers is " . ($num1 + $num2);
						break;
					case "-":
						echo "The difference of the numbers is " . ($num1 - $num2);
						break;
					case "*":
						echo "The product of the numbers is " . ($num1 * $num2);
						break;
					case "/":
						if($num2 != 0) {
							echo "The division of the numbers is " . ($num1 / $num2);
						} else {
							echo "Cannot divide by zero";
						}
						
						
						break;
					default:
						echo "Invalid operator given";
						break;
				}
			} else echo "Last two arguments given are not numbers";
		} else echo "You must enter a string and two numbers";
		
		echo "<br>";
	}
}

?>