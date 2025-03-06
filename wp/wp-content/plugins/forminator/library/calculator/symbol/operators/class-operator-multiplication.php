<?php
/**
 * The Forminator_Calculator_Symbol_Operator_Multiplication class.
 *
 * @package Forminator
 */

/**
 * Operator for mathematical multiplication.
 * Example: "2*3" => 6
 *
 * @see     https://en.wikipedia.org/wiki/Multiplication
 */
class Forminator_Calculator_Symbol_Operator_Multiplication extends Forminator_Calculator_Symbol_Operator_Abstract {

	/**
	 * Identifiers
	 *
	 * @var array
	 */
	protected $identifiers = array( '*' );

	/**
	 * Precedence
	 *
	 * @var int
	 */
	protected $precedence = 200;

	/**
	 * Operate
	 *
	 * @inheritdoc
	 * @param int $left_number Left number.
	 * @param int $right_number Right number.
	 */
	public function operate( $left_number, $right_number ) {
		return $left_number * $right_number;
	}
}
