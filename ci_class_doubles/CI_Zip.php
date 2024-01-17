<?php

/**
 * Fake Zip Compression Class
 */
class CI_Zip
{
	/**
	 * Add Directory
	 *
	 * Lets you add a virtual directory into which you can place files.
	 *
	 * @access	public
	 * @param	mixed	the directory name. Can be string or array
	 * @return	void
	 */
	function add_dir($directory) {}

	/**
	 *	Get file/directory modification time
	 *
	 *	If this is a newly created file/dir, we will set the time to 'now'
	 *
	 *	@param string	path to file
	 *	@return array	filemtime/filemdate
	 */
	function _get_mod_time($dir) {}

	/**
	 * Add Directory
	 *
	 * @access	private
	 * @param	string	the directory name
	 * @return	void
	 */
	function _add_dir($dir, $file_mtime, $file_mdate) {}

	/**
	 * Add Data to Zip
	 *
	 * Lets you add files to the archive. If the path is included
	 * in the filename it will be placed within a directory.  Make
	 * sure you use add_dir() first to create the folder.
	 *
	 * @access	public
	 * @param	mixed
	 * @param	string
	 * @return	void
	 */
	function add_data($filepath, $data = NULL) {}

	/**
	 * Add Data to Zip
	 *
	 * @access	private
	 * @param	string	the file name/path
	 * @param	string	the data to be encoded
	 * @return	void
	 */
	function _add_data($filepath, $data, $file_mtime, $file_mdate) {}

	/**
	 * Read the contents of a file and add it to the zip
	 *
	 * @access	public
	 * @return	bool
	 */
	function read_file($path, $preserve_filepath = FALSE) {}

	/**
	 * Read a directory and add it to the zip.
	 *
	 * This function recursively reads a folder and everything it contains (including
	 * sub-folders) and creates a zip based on it.  Whatever directory structure
	 * is in the original file path will be recreated in the zip file.
	 *
	 * @access	public
	 * @param	string	path to source
	 * @return	bool
	 */
	function read_dir($path, $preserve_filepath = TRUE, $root_path = NULL) {}

	/**
	 * Get the Zip file
	 *
	 * @access	public
	 * @return	binary string
	 */
	function get_zip() {}

	/**
	 * Write File to the specified directory
	 *
	 * Lets you write a file
	 *
	 * @access	public
	 * @param	string	the file name
	 * @return	bool
	 */
	function archive($filepath) {}

	/**
	 * Download
	 *
	 * @access	public
	 * @param	string	the file name
	 * @param	string	the data to be encoded
	 * @return	bool
	 */
	function download($filename = 'backup.zip') {}

	/**
	 * Initialize Data
	 *
	 * Lets you clear current zip data.  Useful if you need to create
	 * multiple zips with different data.
	 *
	 * @access	public
	 * @return	void
	 */
	function clear_data() {}
}
