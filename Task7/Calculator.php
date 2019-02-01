<?php

class Calculator{

	private $arrNumbers;
	
	public function setArguments( $arguments ) {
		
		$this->arrNumbers = array();
			
		if( true == isset( $arguments[2] ) ) {
			$this->arrNumbers = explode(',', $arguments[2]);
		}
		
		return $this->arrNumbers;
	}
	
	public function add() {

		$intSum = 0;
		
		foreach( $this->arrNumbers as $intNumber ) {
			if( $intNumber < 1000 ) {
				$intSum += $intNumber;
			}
		}

		echo $intSum;
	}
	
}

$objCalc = new Calculator();
$objCalc->setArguments($argv);
$objCalc->add();


?>