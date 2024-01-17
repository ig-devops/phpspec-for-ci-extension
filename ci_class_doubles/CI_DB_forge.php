<?php

/**
 * FakeDatabase CI_DB_forge Class
 */
class CI_DB_forge
{
	/**
	 * Create database
	 *
	 * @access	public
	 * @param	string	the database name
	 * @return	bool
	 */
	function create_database($db_name) {}

	/**
	 * Drop database
	 *
	 * @access	public
	 * @param	string	the database name
	 * @return	bool
	 */
	function drop_database($db_name) {}

	/**
	 * Add Key
	 *
	 * @access	public
	 * @param	string	key
	 * @param	string	type
	 * @return	void
	 */
	function add_key($key = '', $primary = FALSE) {}

	/**
	 * Add Field
	 *
	 * @access	public
	 * @param	string	collation
	 * @return	void
	 */
	function add_field($field = '') {}

	/**
	 * Create Table
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function create_table($table = '', $if_not_exists = FALSE) {}

	/**
	 * Drop Table
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function drop_table($table_name) {}

	/**
	 * Rename Table
	 *
	 * @access	public
	 * @param	string	the old table name
	 * @param	string	the new table name
	 * @return	bool
	 */
	function rename_table($table_name, $new_table_name) {}

	/**
	 * Column Add
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	string	the column name
	 * @param	string	the column definition
	 * @return	bool
	 */
	function add_column($table = '', $field = array(), $after_field = '') {}

	/**
	 * Column Drop
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	string	the column name
	 * @return	bool
	 */
	function drop_column($table = '', $column_name = '') {}

	/**
	 * Column Modify
	 *
	 * @access	public
	 * @param	string	the table name
	 * @param	string	the column name
	 * @param	string	the column definition
	 * @return	bool
	 */
	function modify_column($table = '', $field = array()) {}

	/**
	 * Reset
	 *
	 * Resets table creation vars
	 *
	 * @access	private
	 * @return	void
	 */
	function _reset() {}

}
