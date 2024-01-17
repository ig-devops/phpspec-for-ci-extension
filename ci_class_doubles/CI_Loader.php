<?php
/**
 * Description of CI_Loader
 *
 * @author kevin
 */
class CI_Loader
{
    /**
     * Initialize the Loader
     *
     * This method is called once in CI_Controller.
     *
     * @param       array
     * Initialize the Loader * @return      object
     */
    public function initialize() {}

    /**
     * Is Loaded
     *
     * A utility function to test if a class is in the self::$_ci_classes array.
     * This function returns the object name if the class tested for is loaded,
     * and returns FALSE if it isn't.
     *
     * It is mainly used in the form_helper -> _get_validation_object()
     *
     * @param       string  class being checked for
     * @return      mixed   class object name on the CI SuperObject or FALSE
     */
    public function is_loaded($class) {}

    /**
     * Class Loader
     *
     * This function lets users load and instantiate classes.
     * It is designed to be called from a user's app controllers.
     *
     * @param       string  the name of the class
     * @param       mixed   the optional parameters
     * @param       string  an optional object name
     * @return      void
     */
    public function library($library = '', $params = NULL, $object_name = NULL) {}

    /**
     * Model Loader
     *
     * This function lets users load and instantiate models.
     *
     * @param       string  the name of the class
     * @param       string  name for the model
     * @param       bool    database connection
     * @return      void
     */
    public function model($model, $name = '', $db_conn = FALSE) {}

    /**
     * Database Loader
     *
     * @param       string  the DB credentials
     * @param       bool    whether to return the DB object
     * @param       bool    whether to enable active record (this allows us to override the config setting)
     * @return      object
     */
    public function database($params = '', $return = FALSE, $active_record = NULL) {}

    /**
     * Load the Utilities Class
     *
     * @return      string
     */
    public function dbutil() {}

    /**
     * Load the Database Forge Class
     *
     * @return      string
     */
    public function dbforge() {}

    /**
     * Load View
     *
     * This function is used to load a "view" file.  It has three parameters:
     *
     * 1. The name of the "view" file to be included.
     * 2. An associative array of data to be extracted for use in the view.
     * 3. TRUE/FALSE - whether to return the data or load it.  In
     * some cases it's advantageous to be able to return data so that
     * a developer can process it in some way.
     *
     * @param       string
     * @param       array
     * @param       bool
     * @return      void
     */
    public function view($view, $vars = array(), $return = FALSE) {}

    /**
     * Load File
     *
     * This is a generic file loader
     *
     * @param       string
     * @param       bool
     * @return      string
     */
    public function file($path, $return = FALSE) {}

    /**
     * Set Variables
     *
     * Once variables are set they become available within
     * the controller class and its "view" files.
     *
     * @param       array
     * @param       string
     * @return      void
     */
    public function vars($vars = array(), $val = '') {}

    /**
     * Get Variable
     *
     * Check if a variable is set and retrieve it.
     *
     * @param       array
     * @return      void
     */
    public function get_var($key) {}

    /**
     * Load Helper
     *
     * This function loads the specified helper file.
     *
     * @param       mixed
     * @return      void
     */
    public function helper($helpers = array()) {}

    /**
     * Load Helpers
     *
     * This is simply an alias to the above function in case the
     * user has written the plural form of this function.
     *
     * @param       array
     * @return      void
     */
    public function helpers($helpers = array()) {}

    /**
     * Loads a language file
     *
     * @param       array
     * @param       string
     * @return      void
     */
    public function language($file = array(), $lang = '') {}

    /**
     * Loads a config file
     *
     * @param       string
     * @param       bool
     * @param       bool
     * @return      void
     */
    public function config($file = '', $use_sections = FALSE, $fail_gracefully = FALSE) {}

    /**
     * Driver
     *
     * Loads a driver library
     *
     * @param       string  the name of the class
     * @param       mixed   the optional parameters
     * @param       string  an optional object name
     * @return      void
     */
    public function driver($library = '', $params = NULL, $object_name = NULL) {}

    /**
     * Add Package Path
     *
     * Prepends a parent path to the library, model, helper, and config path arrays
     *
     * @param       string
     * @param       boolean
     * @return      void
     */
    public function add_package_path($path, $view_cascade=TRUE) {}

    /**
     * Get Package Paths
     *
     * Return a list of all package paths, by default it will ignore BASEPATH.
     *
     * @param       string
     * @return      void
     */
    public function get_package_paths($include_base = FALSE) {}

    /**
     * Remove Package Path
     *
     * Remove a path from the library, model, and helper path arrays if it exists
     * If no path is provided, the most recently added path is removed.
     *
     * @param       type
     * @param       bool
     * @return      type
     */
    public function remove_package_path($path = '', $remove_config_path = TRUE) {}
}
