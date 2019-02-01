<?php

class Calculator{

	private $arrNumbers;
	
	public function setArguments( $arguments ) {
		$this->arrNumbers = array();
		if( true == isset( $arguments[2] ) ) {
			$arrData = array_filter(preg_split('/\\\\/', $arguments[2]));
            		$this->arrNumbers = array_filter(explode($arrData[2], $arrData[4]));
		}
		return $this->arrNumbers;
	}
	
	public function add() {
		
		$intSum = 0;
		
		foreach( $this->arrNumbers as $intNumber ) {
			if( $intNumber < 0 ) {
				echo 'Error: Negative Numbers not allowed.';
				return;
			} else  {
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
