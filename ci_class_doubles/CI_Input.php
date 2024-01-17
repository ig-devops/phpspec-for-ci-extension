<?php
/**
 * Description of CI_Input
 *
 * @author kevin
 */
class CI_Input
{
    /**
     * Fetch an item from the GET array
     *
     * @access       public
     * @param        string
     * @param        bool
     * @return       string
     */
    function get($index = NULL, $xss_clean = FALSE) {}

    /**
     * Fetch an item from the POST array
     *
     * @access       public
     * @param        string
     * @param        bool
     * @return       string
     */
    function post($index = NULL, $xss_clean = FALSE) {}

    /**
     * Fetch an item from either the GET array or the POST
     *
     * @access       public
     * @param        string  The index key
     * @param        bool    XSS cleaning
     * @return       string
     */
    function get_post($index = '', $xss_clean = FALSE) {}

    /**
     * Fetch an item from the COOKIE array
     *
     * @access       public
     * @param        string
     * @param        bool
     * @return       string
     */
    function cookie($index = '', $xss_clean = FALSE) {}

    /**
     * Set cookie
     *
     * Accepts six parameter, or you can submit an associative
     * array in the first parameter containing all the values.
     *
     * @access       public
     * @param        mixed
     * @param        string  the value of the cookie
     * @param        string  the number of seconds until expiration
     * @param        string  the cookie domain.  Usually:  .yourdomain.com
     * @param        string  the cookie path
     * @param        string  the cookie prefix
     * @param        bool    true makes the cookie secure
     * @return       void
     */
    function set_cookie($name = '', $value = '', $expire = '', $domain = '', $path = '/', $prefix = '', $secure = FALSE) {}

    /**
     * Fetch an item from the SERVER array
     *
     * @access       public
     * @param        string
     * @param        bool
     * @return       string
     */
    function server($index = '', $xss_clean = FALSE) {}

    /**
     * Fetch the IP Address
     *
     * @access       public
     * @return       string
     */
    function ip_address() {}

    /**
     * Validate IP Address
     *
     * @access       public
     * @param        string
     * @param        string  ipv4 or ipv6
     * @return       bool
     */
    public function valid_ip($ip, $which = '') {}

    /**
     * User Agent
     *
     * @access       public
     * @return       string
     */
    function user_agent() {}

    /**
     * Request Headers
     *
     * In Apache, you can simply call apache_request_headers(), however for
     * people running other webservers the function is undefined.
     *
     * @param       bool XSS cleaning
     *
     * @return array
     */
    public function request_headers($xss_clean = FALSE) {}

    /**
     * Get Request Header
     *
     * Returns the value of a single member of the headers class member
     *
     * @param       string          array key for $this->headers
     * @param       boolean         XSS Clean or not
     * @return      mixed           FALSE on failure, string on success
     */
    public function get_request_header($index, $xss_clean = FALSE) {}

    /**
     * Is ajax Request?
     *
     * Test to see if a request contains the HTTP_X_REQUESTED_WITH header
     *
     * @return      boolean
     */
    public function is_ajax_request() {}

    /**
     * Is cli Request?
     *
     * Test to see if a request was made from the command line
     *
     * @return      boolean
     */
    public function is_cli_request() {}

}
