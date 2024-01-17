<?php
/**
 * Description of CI_Config
 *
 * @author kevin
 */
class CI_Config
{
    /**
     * Load Config File
     *
     * @access      public
     * @param       string  the config file name
     * @param   boolean  if configuration values should be loaded into their own section
     * @param   boolean  true if errors should just return false, false if an error message should be displayed
     * @return      boolean if the file was loaded correctly
     */
    function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE) {}

    /**
     * Fetch a config file item
     *
     *
     * @access      public
     * @param       string  the config item name
     * @param       string  the index name
     * @param       bool
     * @return      string
     */
    function item($item, $index = '') {}

    /**
     * Fetch a config file item - adds slash after item (if item is not empty)
     *
     * @access      public
     * @param       string  the config item name
     * @param       bool
     * @return      string
     */
    function slash_item($item) {}

    /**
     * Site URL
     * Returns base_url . index_page [. uri_string]
     *
     * @access      public
     * @param       string  the URI string
     * @return      string
     */
    function site_url($uri = '') {}

    /**
     * Base URL
     * Returns base_url [. uri_string]
     *
     * @access public
     * @param string $uri
     * @return string
     */
    function base_url($uri = '') {}

    /**
     * System URL
     *
     * @access      public
     * @return      string
     */
    function system_url() {}

    /**
     * Set a config file item
     *
     * @access      public
     * @param       string  the config item key
     * @param       string  the config item value
     * @return      void
     */
    function set_item($item, $value) {}
}
