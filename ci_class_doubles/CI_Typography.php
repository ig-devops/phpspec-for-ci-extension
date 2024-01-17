<?php

/**
 * Fake Typography Class
 */
class CI_Typography
{
	/**
	 * Auto Typography
	 *
	 * This function converts text, making it typographically correct:
	 *	- Converts double spaces into paragraphs.
	 *	- Converts single line breaks into <br /> tags
	 *	- Converts single and double quotes into correctly facing curly quote entities.
	 *	- Converts three dots into ellipsis.
	 *	- Converts double dashes into em-dashes.
	 *  - Converts two spaces into entities
	 *
	 * @access	public
	 * @param	string
	 * @param	bool	whether to reduce more then two consecutive newlines to two
	 * @return	string
	 */
	function auto_typography($str, $reduce_linebreaks = FALSE) {}

	/**
	 * Format Characters
	 *
	 * This function mainly converts double and single quotes
	 * to curly entities, but it also converts em-dashes,
	 * double spaces, and ampersands
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function format_characters($str) {}

	/**
	 * Format Newlines
	 *
	 * Converts newline characters into either <p> tags or <br />
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function _format_newlines($str) {}

	/**
	 * Protect Characters
	 *
	 * Protects special characters from being formatted later
	 * We don't want quotes converted within tags so we'll temporarily convert them to {@DQ} and {@SQ}
	 * and we don't want double dashes converted to emdash entities, so they are marked with {@DD}
	 * likewise double spaces are converted to {@NBS} to prevent entity conversion
	 *
	 * @access	public
	 * @param	array
	 * @return	string
	 */
	function _protect_characters($match) {}

	/**
	 * Convert newlines to HTML line breaks except within PRE tags
	 *
	 * @access	public
	 * @param	string
	 * @return	string
	 */
	function nl2br_except_pre($str) {}
}
