<?php
/**
 * Description of CI_URI
 *
 * @author kevin
 */
class CI_URI
{
    /**
     * Set the URI String
     *
     * @access      public
     * @param       string
     * @return      string
     */
    function _set_uri_string($str) {}

    /**
     * Fetch a URI Segment
     *
     * This function returns the URI segment based on the number provided.
     *
     * @access      public
     * @param       integer
     * @param       bool
     * @return      string
     */
    function segment($n, $no_result = FALSE) {}

    /**
     * Fetch a URI "routed" Segment
     *
     * This function returns the re-routed URI segment (assuming routing rules are used)
     * based on the number provided.  If there is no routing this function returns the
     * same result as $this->segment()
     *
     * @access      public
     * @param       integer
     * @param       bool
     * @return      string
     */
    function rsegment($n, $no_result = FALSE) {}

    /**
     * Generate a key value pair from the URI string
     *
     * This function generates and associative array of URI data starting
     * at the supplied segment. For example, if this is your URI:
     *
     *      example.com/user/search/name/joe/location/UK/gender/male
     *
     * You can use this function to generate an array with this prototype:
     *
     * array (
     *                      name => joe
     *                      location => UK
     *                      gender => male
     *               )
     *
     * @access      public
     * @param       integer the starting segment number
     * @param       array   an array of default values
     * @return      array
     */
    function uri_to_assoc($n = 3, $default = array()) {}

    /**
     * Identical to above only it uses the re-routed segment array
     *
     * @access      public
     * @param       integer the starting segment number
     * @param       array   an array of default values
     * @return      array
     *
     */
    function ruri_to_assoc($n = 3, $default = array()) {}

    /**
     * Generate a URI string from an associative array
     *
     *
     * @access      public
     * @param       array   an associative array of key/values
     * @return      array
     */
    function assoc_to_uri($array) {}

    /**
     * Fetch a URI Segment and add a trailing slash
     *
     * @access      public
     * @param       integer
     * @param       string
     * @return      string
     */
    function slash_segment($n, $where = 'trailing') {}

    /**
     * Fetch a URI Segment and add a trailing slash
     *
     * @access      public
     * @param       integer
     * @param       string
     * @return      string
     */
    function slash_rsegment($n, $where = 'trailing') {}

    /**
     * Segment Array
     *
     * @access      public
     * @return      array
     */
    function segment_array() {}

    /**
     * Routed Segment Array
     *
     * @access      public
     * @return      array
     */
    function rsegment_array() {}

    /**
     * Total number of segments
     *
     * @access      public
     * @return      integer
     */
    function total_segments() {}

    /**
     * Total number of routed segments
     *
     * @access      public
     * @return      integer
     */
    function total_rsegments() {}

    /**
     * Fetch the entire URI string
     *
     * @access      public
     * @return      string
     */
    function uri_string() {}

    /**
     * Fetch the entire Re-routed URI string
     *
     * @access      public
     * @return      string
     */
    function ruri_string() {}






















}
