<?php

/**
 * Fake CI Database Result Class
 */
class CI_DB_result
{
	/**
	 * Query result.  Acts as a wrapper function for the following functions.
	 *
	 * @access	public
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
	 */
	public function result($type = 'object') {}

	/**
	 * Custom query result.
	 *
	 * @param class_name A string that represents the type of object you want back
	 * @return array of objects
	 */
	public function custom_result_object($class_name) {}

	/**
	 * Query result.  "object" version.
	 *
	 * @access	public
	 * @return	object
	 */
	public function result_object() {}

	/**
	 * Query result.  "array" version.
	 *
	 * @access	public
	 * @return	array
	 */
	public function result_array() {}

	/**
	 * Query result.  Acts as a wrapper function for the following functions.
	 *
	 * @access	public
	 * @param	string
	 * @param	string	can be "object" or "array"
	 * @return	mixed	either a result object or array
	 */
	public function row($n = 0, $type = 'object') {}

	/**
	 * Assigns an item into a particular column slot
	 *
	 * @access	public
	 * @return	object
	 */
	public function set_row($key, $value = NULL) {}

	/**
	 * Returns a single result row - custom object version
	 *
	 * @access	public
	 * @return	object
	 */
	public function custom_row_object($n, $type) {}

	/**
	 * Returns a single result row - object version
	 *
	 * @access	public
	 * @return	object
	 */
	public function row_object($n = 0) {}

	/**
	 * Returns a single result row - array version
	 *
	 * @access	public
	 * @return	array
	 */
	public function row_array($n = 0) {}

	/**
	 * Returns the "first" row
	 *
	 * @access	public
	 * @return	object
	 */
	public function first_row($type = 'object') {}

	/**
	 * Returns the "last" row
	 *
	 * @access	public
	 * @return	object
	 */
	public function last_row($type = 'object') {}

	/**
	 * Returns the "next" row
	 *
	 * @access	public
	 * @return	object
	 */
	public function next_row($type = 'object') {}

	/**
	 * Returns the "previous" row
	 *
	 * @access	public
	 * @return	object
	 */
	public function previous_row($type = 'object') {}

	public function num_rows() {}

	public function num_fields() {}

	public function list_fields() {}

	public function field_data() {}

	public function free_result() {}

	protected function _data_seek() {}

	protected function _fetch_assoc() {}

	protected function _fetch_object() {}
}