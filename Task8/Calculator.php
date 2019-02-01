<?php
class Calculator {
    private $arrNumbers;
    private $strMethod;

    const IGNORE_VALUE = 1000;

    public function execute() {
        if (false === method_exists($this, $this->strMethod)) {
            echo 'Invalid operation.';
            return;
        }
        $intResult = NULL;
        $arrNegativeNumbers = array();

        foreach ($this->arrNumbers as $intNumber) {
            if (0 > $intNumber) {
                $arrNegativeNumbers[] = $intNumber;
            } elseif (self::IGNORE_VALUE < $intNumber) {
                continue;
            } else {
                $intResult = $this->{$this->strMethod}($intNumber, $intResult);
            }
        }

        if (!empty($arrNegativeNumbers)) {
            echo 'Error: Negative numbers (' . implode(',', $arrNegativeNumbers) . ') not allowed.';
            return;
        }

        echo $intResult;
    }

    private function add($intNumber, $intResult)
    {
	if( $intResult )
		return $intNumber + $intResult;
	else 
		return $intNumber + 0;
        
    }

    private function multiply($intNumber, $intResult)
    {
	if( $intResult )
		return $intNumber * $intResult;
	else 
		return $intNumber * 1;
    }

    public function setArguments($arguments)
    {
        if (false == isset($arguments[1])) {
            echo 'Please add action';
            exit;
        }

        $this->strMethod = $arguments[1];
        $this->arrNumbers = array();
	    
        if ( true == isset( $arguments[2] ) ) {
            if ( false !== strpos( $arguments[2], '\\\\' ) ) {
                $arrData = array_values( array_filter( preg_split('/\\\\/', $arguments[2] ) ) );
                $this->arrNumbers = array_filter( explode( $arrData[0], $arrData[1] ) );
            } else {
                $arguments[2] = str_replace( '\\n', ',', $arguments[2] );
                $this->arrNumbers = array_filter( explode( ',', $arguments[2] ) );
            }
        }

        return $this;
    }
}

$objCalculator = new Calculator();
$objCalculator->setArguments( $argv )
$objCalculator->execute();
