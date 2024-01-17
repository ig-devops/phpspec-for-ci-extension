<?php

/**
 * Fake Image Manipulation class
 */
class CI_Image_lib
{
	/**
	 * Initialize image properties
	 *
	 * Resets values in case this class is used in a loop
	 *
	 * @access	public
	 * @return	void
	 */
	function clear() {}

	/**
	 * initialize image preferences
	 *
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	function initialize($props = array()) {}

	/**
	 * Image Resize
	 *
	 * This is a wrapper function that chooses the proper
	 * resize function based on the protocol specified
	 *
	 * @access	public
	 * @return	bool
	 */
	function resize() {}

	/**
	 * Image Crop
	 *
	 * This is a wrapper function that chooses the proper
	 * cropping function based on the protocol specified
	 *
	 * @access	public
	 * @return	bool
	 */
	function crop() {}

	/**
	 * Image Rotate
	 *
	 * This is a wrapper function that chooses the proper
	 * rotation function based on the protocol specified
	 *
	 * @access	public
	 * @return	bool
	 */
	function rotate() {}

	/**
	 * Image Process Using GD/GD2
	 *
	 * This function will resize or crop
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function image_process_gd($action = 'resize') {}

	/**
	 * Image Process Using ImageMagick
	 *
	 * This function will resize, crop or rotate
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function image_process_imagemagick($action = 'resize') {}

	/**
	 * Image Process Using NetPBM
	 *
	 * This function will resize, crop or rotate
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function image_process_netpbm($action = 'resize') {}

	/**
	 * Image Rotate Using GD
	 *
	 * @access	public
	 * @return	bool
	 */
	function image_rotate_gd() {}

	/**
	 * Create Mirror Image using GD
	 *
	 * This function will flip horizontal or vertical
	 *
	 * @access	public
	 * @return	bool
	 */
	function image_mirror_gd() {}

	/**
	 * Image Watermark
	 *
	 * This is a wrapper function that chooses the type
	 * of watermarking based on the specified preference.
	 *
	 * @access	public
	 * @param	string
	 * @return	bool
	 */
	function watermark() {}

	/**
	 * Watermark - Graphic Version
	 *
	 * @access	public
	 * @return	bool
	 */
	function overlay_watermark() {}

	/**
	 * Watermark - Text Version
	 *
	 * @access	public
	 * @return	bool
	 */
	function text_watermark() {}

	/**
	 * Create Image - GD
	 *
	 * This simply creates an image resource handle
	 * based on the type of image being processed
	 *
	 * @access	public
	 * @param	string
	 * @return	resource
	 */
	function image_create_gd($path = '', $image_type = '') {}

	/**
	 * Write image file to disk - GD
	 *
	 * Takes an image resource as input and writes the file
	 * to the specified destination
	 *
	 * @access	public
	 * @param	resource
	 * @return	bool
	 */
	function image_save_gd($resource) {}

	/**
	 * Dynamically outputs an image
	 *
	 * @access	public
	 * @param	resource
	 * @return	void
	 */
	function image_display_gd($resource) {}

	/**
	 * Re-proportion Image Width/Height
	 *
	 * When creating thumbs, the desired width/height
	 * can end up warping the image due to an incorrect
	 * ratio between the full-sized image and the thumb.
	 *
	 * This function lets us re-proportion the width/height
	 * if users choose to maintain the aspect ratio when resizing.
	 *
	 * @access	public
	 * @return	void
	 */
	function image_reproportion() {}

	/**
	 * Get image properties
	 *
	 * A helper function that gets info about the file
	 *
	 * @access	public
	 * @param	string
	 * @return	mixed
	 */
	function get_image_properties($path = '', $return = FALSE) {}

	/**
	 * Size calculator
	 *
	 * This function takes a known width x height and
	 * recalculates it to a new size.  Only one
	 * new variable needs to be known
	 *
	 *	$props = array(
	 *					'width'			=> $width,
	 *					'height'		=> $height,
	 *					'new_width'		=> 40,
	 *					'new_height'	=> ''
	 *				  );
	 *
	 * @access	public
	 * @param	array
	 * @return	array
	 */
	function size_calculator($vals) {}

	/**
	 * Explode source_image
	 *
	 * This is a helper function that extracts the extension
	 * from the source_image.  This function lets us deal with
	 * source_images with multiple periods, like:  my.cool.jpg
	 * It returns an associative array with two elements:
	 * $array['ext']  = '.jpg';
	 * $array['name'] = 'my.cool';
	 *
	 * @access	public
	 * @param	array
	 * @return	array
	 */
	function explode_name($source_image) {}

	/**
	 * Is GD Installed?
	 *
	 * @access	public
	 * @return	bool
	 */
	function gd_loaded() {}

	/**
	 * Get GD version
	 *
	 * @access	public
	 * @return	mixed
	 */
	function gd_version() {}

	/**
	 * Set error message
	 *
	 * @access	public
	 * @param	string
	 * @return	void
	 */
	function set_error($msg) {}

	/**
	 * Show error messages
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function display_errors($open = '<p>', $close = '</p>') {}
}
