<?php

/**
 * Fake User Agent Class
 */
class CI_User_agent
{
	/**
	 * Is Browser
	 *
	 * @access	public
	 * @return	bool
	 */
	public function is_browser($key = NULL) {}

	/**
	 * Is Robot
	 *
	 * @access	public
	 * @return	bool
	 */
	public function is_robot($key = NULL) {}

	/**
	 * Is Mobile
	 *
	 * @access	public
	 * @return	bool
	 */
	public function is_mobile($key = NULL) {}

	/**
	 * Is this a referral from another site?
	 *
	 * @access	public
	 * @return	bool
	 */
	public function is_referral() {}

	/**
	 * Agent String
	 *
	 * @access	public
	 * @return	string
	 */
	public function agent_string() {}

	/**
	 * Get Platform
	 *
	 * @access	public
	 * @return	string
	 */
	public function platform() {}

	/**
	 * Get Browser Name
	 *
	 * @access	public
	 * @return	string
	 */
	public function browser() {}

	/**
	 * Get the Browser Version
	 *
	 * @access	public
	 * @return	string
	 */
	public function version() {}

	/**
	 * Get The Robot Name
	 *
	 * @access	public
	 * @return	string
	 */
	public function robot() {}

	/**
	 * Get the Mobile Device
	 *
	 * @access	public
	 * @return	string
	 */
	public function mobile() {}

	/**
	 * Get the referrer
	 *
	 * @access	public
	 * @return	bool
	 */
	public function referrer() {}

	/**
	 * Get the accepted languages
	 *
	 * @access	public
	 * @return	array
	 */
	public function languages() {}

	/**
	 * Get the accepted Character Sets
	 *
	 * @access	public
	 * @return	array
	 */
	public function charsets() {}

	/**
	 * Test for a particular language
	 *
	 * @access	public
	 * @return	bool
	 */
	public function accept_lang($lang = 'en') {}

	/**
	 * Test for a particular character set
	 *
	 * @access	public
	 * @return	bool
	 */
	public function accept_charset($charset = 'utf-8') {}
}
