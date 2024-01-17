<?php
/**
 * Description of CI_Router
 *
 * @author kevin
 */
class CI_Router
{
    /**
     * Set the class name
     *
     * @access      public
     * @param       string
     * @return      void
     */
    function set_class($class) {}

    /**
     * Fetch the current class
     *
     * @access      public
     * @return      string
     */
    function fetch_class() {}

    /**
     *  Set the method name
     *
     * @access      public
     * @param       string
     * @return      void
     */
    function set_method($method) {}

    /**
     *  Fetch the current method
     *
     * @access      public
     * @return      string
     */
    function fetch_method() {}

    /**
     *  Set the directory name
     *
     * @access      public
     * @param       string
     * @return      void
     */
    function set_directory($dir) {}

    /**
     *  Fetch the sub-directory (if any) that contains the requested controller class
     *
     * @access      public
     * @return      string
     */
    function fetch_directory() {}

    /**
     *  Set the controller overrides
     *
     * @access      public
     * @param       array
     * @return      null
     */
    function _set_overrides($routing) {}

}
