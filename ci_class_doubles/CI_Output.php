<?php

/**
 * Description of CI_Output
 *
 * @author kevin
 */
class CI_Output
{
    /**
     * Get Output
     *
     * Returns the current output string
     *
     * @access      public
     * @return      string
     */
    function get_output() {}

    /**
     * Set Output
     *
     * Sets the output string
     *
     * @access      public
     * @param       string
     * @return      void
     */
    function set_output($output) {}

    /**
     * Append Output
     *
     * Appends data onto the output string
     *
     * @access      public
     * @param       string
     * @return      void
     */
    function append_output($output) {}

    /**
     * Set Header
     *
     * Lets you set a server header which will be outputted with the final display.
     *
     * Note:  If a file is cached, headers will not be sent.  We need to figure out
     * how to permit header data to be saved with the cache data...
     *
     * @access      public
     * @param       string
     * @param       bool
     * @return      void
     */
    function set_header($header, $replace = TRUE) {}

    /**
     * Set Content Type Header
     *
     * @access      public
     * @param       string  extension of the file we're outputting
     * @return      void
     */
    function set_content_type($mime_type) {}

    /**
     * Set HTTP Status Header
     * moved to Common procedural functions in 1.7.2
     *
     * @access      public
     * @param       int             the status code
     * @param       string
     * @return      void
     */
    function set_status_header($code = 200, $text = '') {}

    /**
     * Enable/disable Profiler
     *
     * @access      public
     * @param       bool
     * @return      void
     */
    function enable_profiler($val = TRUE) {}

    /**
     * Set Profiler Sections
     *
     * Allows override of default / config settings for Profiler section display
     *
     * @access      public
     * @param       array
     * @return      void
     */
    function set_profiler_sections($sections) {}

    /**
     * Set Cache
     *
     * @access      public
     * @param       integer
     * @return      void
     */
    function cache($time) {}

    /**
     * Display Output
     *
     * All "view" data is automatically put into this variable by the controller class:
     *
     * $this->final_output
     *
     * This function sends the finalized output data to the browser along
     * with any server headers and profile data.  It also stops the
     * benchmark timer so the page rendering speed and memory usage can be shown.
     *
     * @access      public
     * @param       string
     * @return      mixed
     */
    function _display($output = '') {}

    /**
     * Write a Cache File
     *
     * @access      public
     * @param       string
     * @return      void
     */
    function _write_cache($output) {}

    /**
     * Update/serve a cached file
     *
     * @access      public
     * @param       object  config class
     * @param       object  uri class
     * @return      void
     */
    function _display_cache(&$CFG, &$URI) {}
}
