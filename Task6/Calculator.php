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
		
		$arrNegativeNumber = [];
		$intSum = 0;
		
		foreach( $this->arrNumbers as $intNumber ) {
			if( $intNumber < 0 )
				$arrNegativeNumber[] = $intNumber;
			else 
				$intSum += $intNumber;
		}
		
		if( false == empty( $arrNegativeNumber ) ) {
			echo 'Error: Negative Numbers {' .implode( ',', $arrNegativeNumber ) . '} not allowed.';
			return;
		}
		
		echo $intSum;
	}
	
}

$objCalc = new Calculator();
$objCalc->setArguments($argv);
$objCalc->add();

?>
