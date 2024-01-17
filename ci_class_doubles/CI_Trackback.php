<?php

/**
 * Fake Trackback Class
 */
class CI_Trackback
{
	/**
	 * Send Trackback
	 *
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	function send($tb_data) {}

	/**
	 * Receive Trackback  Data
	 *
	 * This function simply validates the incoming TB data.
	 * It returns FALSE on failure and TRUE on success.
	 * If the data is valid it is set to the $this->data array
	 * so that it can be inserted into a database.
	 *
	 * @access	public
	 * @return	bool
	 */
	function receive() {}

	/**
	 * Send Trackback Error Message
	 *
	 * Allows custom errors to be set.  By default it
	 * sends the "incomplete information" error, as that's
	 * the most common one.
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function send_error($message = 'Incomplete Information') {}

	/**
	 * Send Trackback Success Message
	 *
	 * This should be called when a trackback has been
	 * successfully received and inserted.
	 *
	 * @access	public
	 * @return	void
	 */
	function send_success() {}

	/**
	 * Fetch a particular item
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function data($item) {}

	/**
	 * Process Trackback
	 *
	 * Opens a socket connection and passes the data to
	 * the server.  Returns TRUE on success, FALSE on failure
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	bool
	 */
	function process($url, $data) {}

	/**
	 * Extract Trackback URLs
	 *
	 * This function lets multiple trackbacks be sent.
	 * It takes a string of URLs (separated by comma or
	 * space) and puts each URL into an array
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function extract_urls($urls) {}

	/**
	 * Validate URL
	 *
	 * Simply adds "http://" if missing
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function validate_url($url) {}

	/**
	 * Find the Trackback URL's ID
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function get_id($url) {}

	/**
	 * Convert Reserved XML characters to Entities
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function convert_xml($str) {}

	/**
	 * Character limiter
	 *
	 * Limits the string based on the character count. Will preserve complete words.
	 *
	 * @access	public
	 * @param	string
	 * @param	integer
	 * @param	string
	 * @return	string
	 */
	function limit_characters($str, $n = 500, $end_char = '&#8230;') {}

	/**
	 * High ASCII to Entities
	 *
	 * Converts Hight ascii text and MS Word special chars
	 * to character entities
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function convert_ascii($str) {}

	/**
	 * Set error message
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_error($msg) {}

	/**
	 * Show error messages
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	function display_errors($open = '<p>', $close = '</p>') {}
}
