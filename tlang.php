#!/usr/bin/php
<?php

/**
 * Given a string on stdin, parse it for finding its programming language 
 * operators and its results.
 *
 * A new custom programming language with its own syntax and operators is the 
 * base of this challenge. Given a string representing such programming 
 * language, it is asked to parse its syntax and understand its operations.
 *
 * Example input: ^= 1 2$
 * Example output: 3
 *
 * Example input: ^# 2 2$
 * Example output:4 
 *
 * Example input: ^@ 2 1$
 * Example output: 1
 *
 */

class ParseLang
{

	function __construct() {
		$f = $this->read_stdin();

		while ($line = fgets($f)) {
			echo $this->parse_lang($line) . PHP_EOL;
		}
	}

	// Parse stdin string
	private function parse_lang( $str ) {
		if(preg_match('/\^[=|#|@]+ [-?\d]+( [-?\d]+)?\$/', $str, $matches) == true) {
			$str = str_replace( array('^','$'), '', $str );
			$arg = explode(' ', $str);

			switch( $arg[0] ) {
				case '=':
					return ( $arg[1] + $arg[2] );
				case '#':
					return ( $arg[1] * $arg[2] );
				case '@':
					return ( $arg[1] - $arg[2] );
			}
		} else {
			return 'This lang does not use such jerga';
		}
	}

	public function read_stdin() {
		$f = fopen('php://stdin', 'r');
		return $f;
	}
}

$plang = new ParseLang();

?>
