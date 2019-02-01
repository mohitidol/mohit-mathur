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
	
	public function sum() {
		if( count( $this->arrNumbers ) <= 2 )
			echo array_sum( $this->arrNumbers );
		else 
			echo 'Enter maximum 2 numbers';
	}
}

$objCalc = new Calculator();
$objCalc->setArguments($argv);
$objCalc->sum();

?>