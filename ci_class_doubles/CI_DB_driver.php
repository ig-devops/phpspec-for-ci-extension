<?php

/**
 * Fake Database Driver Class
 */
class CI_DB_driver
{
	/**
	 * Set client character set
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	resource
	 */
	function db_set_charset($charset, $collation) {}

	/**
	 * The name of the platform in use (mysql, mssql, etc...)
	 *
	 * @access	public
	 * @return	string
	 */
	function platform() {}

	/**
	 * Database Version Number.  Returns a string containing the
	 * version of the database being used
	 *
	 * @access	public
	 * @return	string
	 */
	function version() {}

	/**
	 * Execute the query
	 *
	 * Accepts an SQL string as input and returns a result object upon
	 * successful execution of a "read" type query.  Returns boolean TRUE
	 * upon successful execution of a "write" type query. Returns boolean
	 * FALSE upon failure, and if the $db_debug variable is set to TRUE
	 * will raise an error.
	 *
	 * @access	public
	 * @param	string	An SQL query string
	 * @param	array	An array of binding data
	 * @return	mixed
	 */
	function query($sql, $binds = FALSE, $return_object = TRUE) {}

	/**
	 * Load the result drivers
	 *
	 * @access	public
	 * @return	string	the name of the result class
	 */
	function load_rdriver() {}

	/**
	 * Simple Query
	 * This is a simplified version of the query() function.  Internally
	 * we only use it when running transaction commands since they do
	 * not require all the features of the main query() function.
	 *
	 * @access	public
	 * @param	string	the sql query
	 * @return	mixed
	 */
	function simple_query($sql) {}

	/**
	 * Disable Transactions
	 * This permits transactions to be disabled at run-time.
	 *
	 * @access	public
	 * @return	void
	 */
	function trans_off() {}

	/**
	 * Enable/disable Transaction Strict Mode
	 * When strict mode is enabled, if you are running multiple groups of
	 * transactions, if one group fails all groups will be rolled back.
	 * If strict mode is disabled, each group is treated autonomously, meaning
	 * a failure of one group will not affect any others
	 *
	 * @access	public
	 * @return	void
	 */
	function trans_strict($mode = TRUE) {}

	/**
	 * Start Transaction
	 *
	 * @access	public
	 * @return	void
	 */
	function trans_start($test_mode = FALSE) {}

	/**
	 * Complete Transaction
	 *
	 * @access	public
	 * @return	bool
	 */
	function trans_complete() {}

	/**
	 * Lets you retrieve the transaction flag to determine if it has failed
	 *
	 * @access	public
	 * @return	bool
	 */
	function trans_status() {}

	/**
	 * Compile Bindings
	 *
	 * @access	public
	 * @param	string	the sql statement
	 * @param	array	an array of bind data
	 * @return	string
	 */
	function compile_binds($sql, $binds) {}

	/**
	 * Determines if a query is a "write" type.
	 *
	 * @access	public
	 * @param	string	An SQL query string
	 * @return	boolean
	 */
	function is_write_type($sql) {}

	/**
	 * Calculate the aggregate query elapsed time
	 *
	 * @access	public
	 * @param	integer	The number of decimal places
	 * @return	integer
	 */
	function elapsed_time($decimals = 6) {}

	/**
	 * Returns the total number of queries
	 *
	 * @access	public
	 * @return	integer
	 */
	function total_queries() {}

	/**
	 * Returns the last query that was executed
	 *
	 * @access	public
	 * @return	void
	 */
	function last_query() {}

	/**
	 * "Smart" Escape String
	 *
	 * Escapes data based on type
	 * Sets boolean and null types
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	function escape($str) {}

	/**
	 * Escape LIKE String
	 *
	 * Calls the individual driver for platform
	 * specific escaping for LIKE conditions
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	function escape_like_str($str) {}

	/**
	 * Primary
	 *
	 * Retrieves the primary key.  It assumes that the row in the first
	 * position is the primary key
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	string
	 */
	function primary($table = '') {}

	/**
	 * Returns an array of table names
	 *
	 * @access	public
	 * @return	array
	 */
	function list_tables($constrain_by_prefix = FALSE) {}

	/**
	 * Determine if a particular table exists
	 * @access	public
	 * @return	boolean
	 */
	function table_exists($table_name) {}

	/**
	 * Fetch MySQL Field Names
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	array
	 */
	function list_fields($table = '') {}

	/**
	 * Determine if a particular field exists
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	boolean
	 */
	function field_exists($field_name, $table_name) {}

	/**
	 * Returns an object with field data
	 *
	 * @access	public
	 * @param	string	the table name
	 * @return	object
	 */
	function field_data($table = '') {}

	/**
	 * Generate an insert string
	 *
	 * @access	public
	 * @param	string	the table upon which the query will be performed
	 * @param	array	an associative array data of key/values
	 * @return	string
	 */
	function insert_string($table, $data) {}

	/**
	 * Generate an update string
	 *
	 * @access	public
	 * @param	string	the table upon which the query will be performed
	 * @param	array	an associative array data of key/values
	 * @param	mixed	the "where" statement
	 * @return	string
	 */
	function update_string($table, $data, $where) {}

	/**
	 * Enables a native PHP function to be run, using a platform agnostic wrapper.
	 *
	 * @access	public
	 * @param	string	the function name
	 * @param	mixed	any parameters needed by the function
	 * @return	mixed
	 */
	function call_function($function) {}

	/**
	 * Set Cache Directory Path
	 *
	 * @access	public
	 * @param	string	the path to the cache directory
	 * @return	void
	 */
	function cache_set_path($path = '') {}

	/**
	 * Enable Query Caching
	 *
	 * @access	public
	 * @return	void
	 */
	function cache_on() {}

	/**
	 * Disable Query Caching
	 *
	 * @access	public
	 * @return	void
	 */
	function cache_off() {}

	/**
	 * Delete the cache files associated with a particular URI
	 *
	 * @access	public
	 * @return	void
	 */
	function cache_delete($segment_one = '', $segment_two = '') {}

	/**
	 * Delete All cache files
	 *
	 * @access	public
	 * @return	void
	 */
	function cache_delete_all() {}

	/**
	 * Close DB Connection
	 *
	 * @access	public
	 * @return	void
	 */
	function close() {}

	/**
	 * Display an error message
	 *
	 * @access	public
	 * @param	string	the error message
	 * @param	string	any "swap" values
	 * @param	boolean	whether to localize the message
	 * @return	string	sends the application/error_db.php template
	 */
	function display_error($error = '', $swap = '', $native = FALSE) {}
}
