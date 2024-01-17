<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CI_Utf8
 *
 * @author kevin
 */
class CI_Utf8
{
    /**
     * Clean UTF-8 strings
     *
     * Ensures strings are UTF-8
     *
     * @access      public
     * @param       string
     * @return      string
     */
    function clean_string($str) {}

    /**
     * Remove ASCII control characters
     *
     * Removes all ASCII control characters except horizontal tabs,
     * line feeds, and carriage returns, as all others can cause
     * problems in XML
     *
     * @access      public
     * @param       string
     * @return      string
     */
    function safe_ascii_for_xml($str) {}

    /**
    * Convert to UTF-8
    *
    * Attempts to convert a string to UTF-8
    *
    * @access      public
    * @param       string
    * @param       string  - input encoding
    * @return      string
    */
   function convert_to_utf8($str, $encoding) {}

    /**
     * Is ASCII?
     *
     * Tests if a string is standard 7-bit ASCII or not
     *
     * @access      public
     * @param       string
     * @return      bool
     */
    function _is_ascii($str) {}
}
