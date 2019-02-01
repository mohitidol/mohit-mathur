<?php

class Calculator{

	private $arrNumbers;
	
	public function setArguments( $arguments ) {
		$this->arrNumbers = array();
		if( true == isset( $arguments[2] ) ) {
			$this->arrNumbers = explode( ',', $arguments[2] );
		}
		return $this->arrNumbers;
	}
	
	public function add() {
		echo array_sum( $this->arrNumbers );
	}

}

$objCalc = new Calculator();
$objCalc->setArguments($argv);
$objCalc->add();

?>