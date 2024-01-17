<?php

/**
 *  Fake CI_DB_utility Class
 */
class CI_DB_utility extends CI_DB_forge
{
	/**
	 * List databases
	 *
	 * @access	public
	 * @return	bool
	 */
	function list_databases() {}

	/**
	 * Determine if a particular database exists
	 *
	 * @access	public
	 * @param	string
	 * @return	boolean
	 */
	function database_exists($database_name) {}

	/**
	 * Optimize Table
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function optimize_table($table_name) {}

	/**
	 * Optimize Database
	 *
	 * @access	public
	 * @return	array
	 */
	function optimize_database() {}

	/**
	 * Repair Table
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	bool
	 */
	function repair_table($table_name) {}

	/**
	 * Generate CSV from a query result object
	 *
	 * @access	public
	 * @param	object	The query result object
	 * @param	string	The delimiter - comma by default
	 * @param	string	The newline character - \n by default
	 * @param	string	The enclosure - double quote by default
	 * @return	string
	 */
	function csv_from_result($query, $delim = ",", $newline = "\n", $enclosure = '"') {}

	/**
	 * Generate XML data from a query result object
	 *
	 * @access	public
	 * @param	object	The query result object
	 * @param	array	Any preferences
	 * @return	string
	 */
	function xml_from_result($query, $params = array()) {}

	/**
	 * Database Backup
	 *
	 * @access	public
	 * @return	void
	 */
	function backup($params = array()) {}
}
