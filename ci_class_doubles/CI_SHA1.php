<?php

/**
 * Fake SHA1 Encoding Class
 */
class CI_SHA1
{
	/**
	 * Generate the Hash
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function generate($str) {}

	/**
	 * Convert a decimal to hex
	 *
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _hex($str) {}

	/**
	 *  Return result based on iteration
	 *
	 * @access	private
	 * @return	string
	 */
	function _ft($t, $b, $c, $d) {}

	/**
	 * Determine the additive constant
	 *
	 * @access	private
	 * @return	string
	 */
	function _kt($t) {}

	/**
	 * Add integers, wrapping at 2^32
	 *
	 * @access	private
	 * @return	string
	 */
	function _safe_add($x, $y) {}

	/**
	 * Bitwise rotate a 32-bit number
	 *
	 * @access	private
	 * @return	integer
	 */
	function _rol($num, $cnt) {}

	/**
	 * Pad string with zero
	 *
	 * @access	private
	 * @return	string
	 */
	function _zero_fill($a, $b) {}
}
