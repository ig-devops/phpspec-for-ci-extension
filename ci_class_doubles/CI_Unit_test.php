<?php

/**
 * Fake Unit Testing Class
 */
class CI_Unit_test
{
	/**
	 * Run the tests
	 *
	 * Runs the supplied tests
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	function set_test_items($items = array()) {}

	/**
	 * Run the tests
	 *
	 * Runs the supplied tests
	 *
	 * @access	public
	 * @param	mixed
	 * @param	mixed
	 * @param	string
	 * @return	string
	 */
	function run($test, $expected = TRUE, $test_name = 'undefined', $notes = '') {}

	/**
	 * Generate a report
	 *
	 * Displays a table with the test data
	 *
	 * @access	public
	 * @return	string
	 */
	function report($result = array()) {}

	/**
	 * Use strict comparison
	 *
	 * Causes the evaluation to use === rather than ==
	 *
	 * @access	public
	 * @param	bool
	 * @return	null
	 */
	function use_strict($state = TRUE) {}

	/**
	 * Make Unit testing active
	 *
	 * Enables/disables unit testing
	 *
	 * @access	public
	 * @param	bool
	 * @return	null
	 */
	function active($state = TRUE) {}

	/**
	 * Result Array
	 *
	 * Returns the raw result data
	 *
	 * @access	public
	 * @return	array
	 */
	function result($results = array()) {}

	/**
	 * Set the template
	 *
	 * This lets us set the template to be used to display results
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_template($template) {}

	/**
	 * Generate a backtrace
	 *
	 * This lets us show file names and line numbers
	 *
	 * @access	private
	 * @return	array
	 */
	function _backtrace() {}

	/**
	 * Get Default Template
	 *
	 * @access	private
	 * @return	string
	 */
	function _default_template() {}

	/**
	 * Parse Template
	 *
	 * Harvests the data within the template {pseudo-variables}
	 *
	 * @access	private
	 * @return	void
	 */
	function _parse_template() {}
}
