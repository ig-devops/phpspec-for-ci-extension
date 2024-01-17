<?php

/**
 * Fake File Uploading Class
 */
class CI_Upload
{
	/**
	 * Initialize preferences
	 *
	 * @param	array
	 * @return	void
	 */
	public function initialize($config = array()) {}

	/**
	 * Perform the file upload
	 *
	 * @return	bool
	 */
	public function do_upload($field = 'userfile') {}

	/**
	 * Finalized Data Array
	 *
	 * Returns an associative array containing all of the information
	 * related to the upload, allowing the developer easy access in one array.
	 *
	 * @return	array
	 */
	public function data() {}

	/**
	 * Set Upload Path
	 *
	 * @param	string
	 * @return	void
	 */
	public function set_upload_path($path) {}

	/**
	 * Set the file name
	 *
	 * This function takes a filename/path as input and looks for the
	 * existence of a file with the same name. If found, it will append a
	 * number to the end of the filename to avoid overwriting a pre-existing file.
	 *
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	public function set_filename($path, $filename) {}

	/**
	 * Set Maximum File Size
	 *
	 * @param	integer
	 * @return	void
	 */
	public function set_max_filesize($n) {}

	/**
	 * Set Maximum File Name Length
	 *
	 * @param	integer
	 * @return	void
	 */
	public function set_max_filename($n) {}

	/**
	 * Set Maximum Image Width
	 *
	 * @param	integer
	 * @return	void
	 */
	public function set_max_width($n) {}

	/**
	 * Set Maximum Image Height
	 *
	 * @param	integer
	 * @return	void
	 */
	public function set_max_height($n) {}

	/**
	 * Set Allowed File Types
	 *
	 * @param	string
	 * @return	void
	 */
	public function set_allowed_types($types) {}

	/**
	 * Set Image Properties
	 *
	 * Uses GD to determine the width/height/type of image
	 *
	 * @param	string
	 * @return	void
	 */
	public function set_image_properties($path = '') {}

	/**
	 * Set XSS Clean
	 *
	 * Enables the XSS flag so that the file that was uploaded
	 * will be run through the XSS filter.
	 *
	 * @param	bool
	 * @return	void
	 */
	public function set_xss_clean($flag = FALSE) {}

	/**
	 * Validate the image
	 *
	 * @return	bool
	 */
	public function is_image() {}

	/**
	 * Verify that the filetype is allowed
	 *
	 * @return	bool
	 */
	public function is_allowed_filetype($ignore_mime = FALSE) {}

	/**
	 * Verify that the file is within the allowed size
	 *
	 * @return	bool
	 */
	public function is_allowed_filesize() {}

	/**
	 * Verify that the image is within the allowed width/height
	 *
	 * @return	bool
	 */
	public function is_allowed_dimensions() {}

	/**
	 * Validate Upload Path
	 *
	 * Verifies that it is a valid upload path with proper permissions.
	 *
	 *
	 * @return	bool
	 */
	public function validate_upload_path() {}

	/**
	 * Extract the file extension
	 *
	 * @param	string
	 * @return	string
	 */
	public function get_extension($filename) {}

	/**
	 * Clean the file name for security
	 *
	 * @param	string
	 * @return	string
	 */
	public function clean_file_name($filename) {}

	/**
	 * Limit the File Name Length
	 *
	 * @param	string
	 * @return	string
	 */
	public function limit_filename_length($filename, $length) {}

	/**
	 * Runs the file through the XSS clean function
	 *
	 * This prevents people from embedding malicious code in their files.
	 * I'm not sure that it won't negatively affect certain files in unexpected ways,
	 * but so far I haven't found that it causes trouble.
	 *
	 * @return	void
	 */
	public function do_xss_clean() {}

	/**
	 * Set an error message
	 *
	 * @param	string
	 * @return	void
	 */
	public function set_error($msg) {}

	/**
	 * Display the error message
	 *
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	public function display_errors($open = '<p>', $close = '</p>') {}

	/**
	 * List of Mime Types
	 *
	 * This is a list of mime types.  We use it to validate
	 * the "allowed types" set by the developer
	 *
	 * @param	string
	 * @return	string
	 */
	public function mimes_types($mime) {}

	/**
	 * Prep Filename
	 *
	 * Prevents possible script execution from Apache's handling of files multiple extensions
	 * http://httpd.apache.org/docs/1.3/mod/mod_mime.html#multipleext
	 *
	 * @param	string
	 * @return	string
	 */
	protected function _prep_filename($filename) {}

	/**
	 * File MIME type
	 *
	 * Detects the (actual) MIME type of the uploaded file, if possible.
	 * The input array is expected to be $_FILES[$field]
	 *
	 * @param	array
	 * @return	void
	 */
	protected function _file_mime_type($file) {}
}
