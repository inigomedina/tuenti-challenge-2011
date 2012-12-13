#!/usr/bin/php
<?php

class CalculateSumEmirps
{

	function __construct() {
		$f = $this->read_stdin();

		while ($line = fgets($f)) {
			echo $this->sum_emirps($line) . PHP_EOL;
		}
	}

	public function read_stdin() {
		$f = fopen('php://stdin', 'r');
		return $f;
	}

	private function sum_emirps($limit) {
		$emirps = $this->build_emirps($limit);
		$sum = 0;
		foreach($emirps as $emirp) {
			$sum += $emirp;
		}

		return $sum;
	}


	private function build_emirps($max) {

		$primes = array();
		$emirps = array();

		for($i = 2; $i <= $max; $i++) {
			if($this->check_is_prime($i)) {
				$primes[] = $i;
			}
		}

		foreach($primes as $prime) {
			$reverse = strrev($prime);
			if($reverse == $prime)
				continue;
			if($this->check_is_prime($reverse)) {
				$emirps[] = $reverse;
			}
		}

		return $emirps;
	}

	public function check_is_prime( $num ) {

		if($num == 1)
			return false;

		if(($num != 2) & ($num % 2 == 0))
			return false;

		for( $i = 3; $i <= ceil(sqrt($num)); $i = $i +2 ) {
			if($num % $i == 0)
				return false;
		}

		return true;
	}
}

$calc = new CalculateSumEmirps();

?>
