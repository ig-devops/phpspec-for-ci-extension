<?php

/**
 * Fake CI_Migration Class
 */
class CI_Migration
{
	/**
	 * Migrate to a schema version
	 *
	 * Calls each migration step required to get to the schema version of
	 * choice
	 *
	 * @access	public
	 * @param $version integer	Target schema version
	 * @return	mixed	TRUE if already latest, FALSE if failed, int if upgraded
	 */
	public function version($target_version) {}

	/**
	 * Set's the schema to the latest migration
	 *
	 * @access	public
	 * @return	mixed	true if already latest, false if failed, int if upgraded
	 */
	public function latest() {}

	/**
	 * Set's the schema to the migration version set in config
	 *
	 * @access	public
	 * @return	mixed	true if already current, false if failed, int if upgraded
	 */
	public function current() {}

	/**
	 * Error string
	 *
	 * @access	public
	 * @return	string	Error message returned as a string
	 */
	public function error_string() {}

	/**
	 * Enable the use of CI super-global
	 *
	 * @access	public
	 * @param $var
	 * @return	mixed
	 */
	public function __get($var) {}
}
