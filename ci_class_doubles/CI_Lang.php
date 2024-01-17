<?php
/**
 * Description of CI_Lang
 *
 * @author kevin
 */
class CI_Lang
{
    /**
     * Load a language file
     *
     * @access      public
     * @param       mixed   the name of the language file to be loaded. Can be an array
     * @param       string  the language (english, etc.)
     * @param       bool    return loaded array of translations
     * @param       bool    add suffix to $langfile
     * @param       string  alternative path to look for language file
     * @return      mixed
     */
    function load($langfile = '', $idiom = '', $return = FALSE, $add_suffix = TRUE, $alt_path = '') {}

    /**
     * Fetch a single line of text from the language array
     *
     * @access      public
     * @param       string  $line   the language line
     * @return      string
     */
    function line($line = '') {}
}
