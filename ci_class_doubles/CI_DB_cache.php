<?php

/**
 * FakeDatabase Cache Class
 */
class CI_DB_Cache
{

	/**
	 * Set Cache Directory Path
	 *
	 * @access	public
	 * @param	string	the path to the cache directory
	 * @return	bool
	 */
	function check_path($path = '') {}

	/**
	 * Retrieve a cached query
	 *
	 * The URI being requested will become the name of the cache sub-folder.
	 * An MD5 hash of the SQL statement will become the cache file name
	 *
	 * @access	public
	 * @return	string
	 */
	function read($sql) {}

	/**
	 * Write a query to a cache file
	 *
	 * @access	public
	 * @return	bool
	 */
	function write($sql, $object) {}

	/**
	 * Delete cache files within a particular directory
	 *
	 * @access	public
	 * @return	bool
	 */
	function delete($segment_one = '', $segment_two = '') {}

	/**
	 * Delete all existing cache files
	 *
	 * @access	public
	 * @return	bool
	 */
	function delete_all() {}

}