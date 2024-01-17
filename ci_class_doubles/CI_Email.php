<?php

/**
 * Fake CodeIgniter Email Class
 */
class CI_Email
{
	/**
	 * Initialize preferences
	 *
	 * @access	public
	 * @param	array
	 * @return	void
	 */
	public function initialize($config = array()) {}

	/**
	 * Initialize the Email Data
	 *
	 * @access	public
	 * @return	void
	 */
	public function clear($clear_attachments = FALSE) {}

	/**
	 * Set FROM
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	public function from($from, $name = '') {}

	/**
	 * Set Reply-to
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	public function reply_to($replyto, $name = '') {}

	/**
	 * Set Recipients
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function to($to) {}

	/**
	 * Set CC
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function cc($cc) {}

	/**
	 * Set BCC
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	public function bcc($bcc, $limit = '') {}

	/**
	 * Set Email Subject
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function subject($subject) {}

	/**
	 * Set Body
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function message($body) {}

	/**
	 * Assign file attachments
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function attach($filename, $disposition = 'attachment') {}

	/**
	 * Add a Header Item
	 *
	 * @access	protected
	 * @param	string
	 * @param	string
	 * @return	void
	 */
	protected function _set_header($header, $value) {}

	/**
	 * Convert a String to an Array
	 *
	 * @access	protected
	 * @param	string
	 * @return	array
	 */
	protected function _str_to_array($email) {}

	/**
	 * Set Multipart Value
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_alt_message($str = '') {}

	/**
	 * Set Mailtype
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_mailtype($type = 'text') {}

	/**
	 * Set Wordwrap
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_wordwrap($wordwrap = TRUE) {}

	/**
	 * Set Protocol
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_protocol($protocol = 'mail') {}

	/**
	 * Set Priority
	 *
	 * @access	public
	 * @param	integer
	 * @return	void
	 */
	public function set_priority($n = 3) {}

	/**
	 * Set Newline Character
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_newline($newline = "\n") {}

	/**
	 * Set CRLF
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	public function set_crlf($crlf = "\n") {}

	/**
	 * Set Message Boundary
	 *
	 * @access	protected
	 * @return	void
	 */
	protected function _set_boundaries() {}

	/**
	 * Get the Message ID
	 *
	 * @access	protected
	 * @return	string
	 */
	protected function _get_message_id() {}

	/**
	 * Get Mail Protocol
	 *
	 * @access	protected
	 * @param	bool
	 * @return	string
	 */
	protected function _get_protocol($return = TRUE) {}

	/**
	 * Get Mail Encoding
	 *
	 * @access	protected
	 * @param	bool
	 * @return	string
	 */
	protected function _get_encoding($return = TRUE) {}

	/**
	 * Get content type (text/html/attachment)
	 *
	 * @access	protected
	 * @return	string
	 */
	protected function _get_content_type() {}

	/**
	 * Set RFC 822 Date
	 *
	 * @access	protected
	 * @return	string
	 */
	protected function _set_date() {}

	/**
	 * Mime message
	 *
	 * @access	protected
	 * @return	string
	 */
	protected function _get_mime_message() {}

	/**
	 * Validate Email Address
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function validate_email($email) {}

	/**
	 * Email Validation
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	public function valid_email($address) {}

	/**
	 * Clean Extended Email Address: Joe Smith <joe@smith.com>
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	public function clean_email($email) {}

	/**
	 * Word Wrap
	 *
	 * @access	public
	 * @param	string
	 * @param	integer
	 * @return	string
	 */
	public function word_wrap($str, $charlim = '') {}

	/**
	 * Send Email
	 *
	 * @access	public
	 * @return	bool
	 */
	public function send() {}

	/**
	 * Batch Bcc Send.  Sends groups of BCCs in batches
	 *
	 * @access	public
	 * @return	bool
	 */
	public function batch_bcc_send() {}

	/**
	 * Get Debug Message
	 *
	 * @access	public
	 * @return	string
	 */
	public function print_debugger() {}
}
