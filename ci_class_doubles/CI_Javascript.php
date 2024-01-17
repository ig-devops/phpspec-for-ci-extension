<?php

/**
 * Fake CI_Javascript Class
 */
class CI_Javascript
{
	/**
	 * Blur
	 *
	 * Outputs a javascript library blur event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function blur($element = 'this', $js = '') {}

	/**
	 * Change
	 *
	 * Outputs a javascript library change event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function change($element = 'this', $js = '') {}

	/**
	 * Click
	 *
	 * Outputs a javascript library click event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @param	boolean	whether or not to return false
	 * @return	string
	 */
	function click($element = 'this', $js = '', $ret_false = TRUE) {}

	/**
	 * Double Click
	 *
	 * Outputs a javascript library dblclick event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function dblclick($element = 'this', $js = '') {}

	/**
	 * Error
	 *
	 * Outputs a javascript library error event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function error($element = 'this', $js = '') {}

	/**
	 * Focus
	 *
	 * Outputs a javascript library focus event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function focus($element = 'this', $js = '') {}

	/**
	 * Hover
	 *
	 * Outputs a javascript library hover event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- Javascript code for mouse over
	 * @param	string	- Javascript code for mouse out
	 * @return	string
	 */
	function hover($element = 'this', $over, $out) {}

	/**
	 * Keydown
	 *
	 * Outputs a javascript library keydown event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function keydown($element = 'this', $js = '') {}

	/**
	 * Keyup
	 *
	 * Outputs a javascript library keydown event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function keyup($element = 'this', $js = '') {}

	/**
	 * Load
	 *
	 * Outputs a javascript library load event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function load($element = 'this', $js = '') {}

	/**
	 * Mousedown
	 *
	 * Outputs a javascript library mousedown event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function mousedown($element = 'this', $js = '') {}

	/**
	 * Mouse Out
	 *
	 * Outputs a javascript library mouseout event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function mouseout($element = 'this', $js = '') {}

	/**
	 * Mouse Over
	 *
	 * Outputs a javascript library mouseover event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function mouseover($element = 'this', $js = '') {}

	/**
	 * Mouseup
	 *
	 * Outputs a javascript library mouseup event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function mouseup($element = 'this', $js = '') {}

	/**
	 * Output
	 *
	 * Outputs the called javascript to the screen
	 *
	 * @access	public
	 * @param	string	The code to output
	 * @return	string
	 */
	function output($js) {}

	/**
	 * Ready
	 *
	 * Outputs a javascript library mouseup event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function ready($js) {}

	/**
	 * Resize
	 *
	 * Outputs a javascript library resize event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function resize($element = 'this', $js = '') {}

	/**
	 * Scroll
	 *
	 * Outputs a javascript library scroll event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function scroll($element = 'this', $js = '') {}

	/**
	 * Unload
	 *
	 * Outputs a javascript library unload event
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	string	The code to execute
	 * @return	string
	 */
	function unload($element = 'this', $js = '') {}

	/**
	 * Add Class
	 *
	 * Outputs a javascript library addClass event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- Class to add
	 * @return	string
	 */
	function addClass($element = 'this', $class = '') {}

	/**
	 * Animate
	 *
	 * Outputs a javascript library animate event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function animate($element = 'this', $params = array(), $speed = '', $extra = '') {}

	/**
	 * Fade In
	 *
	 * Outputs a javascript library hide event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function fadeIn($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Fade Out
	 *
	 * Outputs a javascript library hide event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function fadeOut($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Slide Up
	 *
	 * Outputs a javascript library slideUp event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function slideUp($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Remove Class
	 *
	 * Outputs a javascript library removeClass event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- Class to add
	 * @return	string
	 */
	function removeClass($element = 'this', $class = '') {}

	/**
	 * Slide Down
	 *
	 * Outputs a javascript library slideDown event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function slideDown($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Slide Toggle
	 *
	 * Outputs a javascript library slideToggle event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function slideToggle($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Hide
	 *
	 * Outputs a javascript library hide action
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function hide($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Toggle
	 *
	 * Outputs a javascript library toggle event
	 *
	 * @access	public
	 * @param	string	- element
	 * @return	string
	 */
	function toggle($element = 'this') {}

	/**
	 * Toggle Class
	 *
	 * Outputs a javascript library toggle class event
	 *
	 * @access	public
	 * @param	string	- element
	 * @return	string
	 */
	function toggleClass($element = 'this', $class='') {}

	/**
	 * Show
	 *
	 * Outputs a javascript library show event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function show($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Compile
	 *
	 * gather together all script needing to be output
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @return	string
	 */
	function compile($view_var = 'script_foot', $script_tags = TRUE) {}

	/**
	 * Clear Compile
	 *
	 * Clears any previous javascript collected for output
	 *
	 * @access	public
	 * @return	void
	 */
	function clear_compile() {}

	/**
	 * External
	 *
	 * Outputs a <script> tag with the source as an external js file
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @return	string
	 */
	function external($external_file = '', $relative = FALSE) {}

	/**
	 * Inline
	 *
	 * Outputs a <script> tag
	 *
	 * @access	public
	 * @param	string	The element to attach the event to
	 * @param	boolean	If a CDATA section should be added
	 * @return	string
	 */
	function inline($script, $cdata = TRUE) {}

	/**
	 * Open Script
	 *
	 * Outputs an opening <script>
	 *
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _open_script($src = '') {}

	/**
	 * Close Script
	 *
	 * Outputs an closing </script>
	 *
	 * @access	private
	 * @param	string
	 * @return	string
	 */
	function _close_script($extra = "\n") {}

	/**
	 * Update
	 *
	 * Outputs a javascript library slideDown event
	 *
	 * @access	public
	 * @param	string	- element
	 * @param	string	- One of 'slow', 'normal', 'fast', or time in milliseconds
	 * @param	string	- Javascript callback function
	 * @return	string
	 */
	function update($element = 'this', $speed = '', $callback = '') {}

	/**
	 * Generate JSON
	 *
	 * Can be passed a database result or associative array and returns a JSON formatted string
	 *
	 * @param	mixed	result set or array
	 * @param	bool	match array types (defaults to objects)
	 * @return	string	a json formatted string
	 */
	function generate_json($result = NULL, $match_array_type = FALSE) {}

	/**
	 * Is associative array
	 *
	 * Checks for an associative array
	 *
	 * @access	public
	 * @param	type
	 * @return	type
	 */
	function _is_associative_array($arr) {}

	/**
	 * Prep Args
	 *
	 * Ensures a standard json value and escapes values
	 *
	 * @access	public
	 * @param	type
	 * @return	type
	 */
	function _prep_args($result, $is_key = FALSE) {}
}
