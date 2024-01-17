<?php

/**
 * Fake XML-RPC server class
 */
class CI_Xmlrpcs extends CI_Xmlrpc
{
	/**
	 * Initialize Prefs and Serve
	 *
	 * @access	public
	 * @param	mixed
	 * @return	void
	 */
	function initialize($config=array()) {}

	/**
	 * Setting of System Methods
	 *
	 * @access	public
	 * @return	void
	 */
	function set_system_methods() {}

	/**
	 * Main Server Function
	 *
	 * @access	public
	 * @return	void
	 */
	function serve() {}

	/**
	 * Add Method to Class
	 *
	 * @access	public
	 * @param	string	method name
	 * @param	string	function
	 * @param	string	signature
	 * @param	string	docstring
	 * @return	void
	 */
	function add_to_map($methodname, $function, $sig, $doc) {}

	/**
	 * Parse Server Request
	 *
	 * @access	public
	 * @param	string	data
	 * @return	object	xmlrpc response
	 */
	function parseRequest($data='') {}

	/**
	 * Executes the Method
	 *
	 * @access	protected
	 * @param	object
	 * @return	mixed
	 */
	function _execute($m) {}

	/**
	 * Server Function:  List Methods
	 *
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function listMethods($m) {}

	/**
	 * Server Function:  Return Signature for Method
	 *
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function methodSignature($m) {}

	/**
	 * Server Function:  Doc String for Method
	 *
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function methodHelp($m) {}

	/**
	 * Server Function:  Multi-call
	 *
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function multicall($m) {}

	/**
	 *  Multi-call Function:  Error Handling
	 *
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function multicall_error($err) {}

	/**
	 *  Multi-call Function:  Processes method
	 *
	 * @access	public
	 * @param	mixed
	 * @return	object
	 */
	function do_multicall($call) {}
}
