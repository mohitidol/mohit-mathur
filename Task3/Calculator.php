<?php

class Calculator{

	private $arrNumbers;
	
	public function setArguments( $arguments ) {
		$this->arrNumbers = array();
		if( true == isset( $arguments[2] ) ) {
			preg_match_all('([\d]+)', $arguments[2], $match);
			$this->arrNumbers = $match[0];
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