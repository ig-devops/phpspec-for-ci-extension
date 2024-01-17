<?php

/**
 * Fake Shopping Cart Class
 *
 */
class CI_Cart
{
	/**
	 * Insert items into the cart and save it to the session table
	 *
	 * @access	public
	 * @param	array
	 * @return	bool
	 */
	function insert($items = array()) {}

	/**
	 * Insert
	 *
	 * @access	private
	 * @param	array
	 * @return	bool
	 */
	function _insert($items = array()) {}

	/**
	 * Update the cart
	 *
	 * This function permits the quantity of a given item to be changed.
	 * Typically it is called from the "view cart" page if a user makes
	 * changes to the quantity before checkout. That array must contain the
	 * product ID and quantity for each item.
	 *
	 * @access	public
	 * @param	array
	 * @param	string
	 * @return	bool
	 */
	function update($items = array()) {}

	/**
	 * Update the cart
	 *
	 * This function permits the quantity of a given item to be changed.
	 * Typically it is called from the "view cart" page if a user makes
	 * changes to the quantity before checkout. That array must contain the
	 * product ID and quantity for each item.
	 *
	 * @access	private
	 * @param	array
	 * @return	bool
	 */
	function _update($items = array()) {}

	/**
	 * Save the cart array to the session DB
	 *
	 * @access	private
	 * @return	bool
	 */
	function _save_cart() {}

	/**
	 * Cart Total
	 *
	 * @access	public
	 * @return	integer
	 */
	function total() {}

	/**
	 * Total Items
	 *
	 * Returns the total item count
	 *
	 * @access	public
	 * @return	integer
	 */
	function total_items() {}

	/**
	 * Cart Contents
	 *
	 * Returns the entire cart array
	 *
	 * @access	public
	 * @return	array
	 */
	function contents() {}

	/**
	 * Has options
	 *
	 * Returns TRUE if the rowid passed to this function correlates to an item
	 * that has options associated with it.
	 *
	 * @access	public
	 * @return	array
	 */
	function has_options($rowid = '') {}

	/**
	 * Product options
	 *
	 * Returns the an array of options, for a particular product row ID
	 *
	 * @access	public
	 * @return	array
	 */
	function product_options($rowid = '') {}

	/**
	 * Format Number
	 *
	 * Returns the supplied number with commas and a decimal point.
	 *
	 * @access	public
	 * @return	integer
	 */
	function format_number($n = '') {}

	/**
	 * Destroy the cart
	 *
	 * Empties the cart and kills the session
	 *
	 * @access	public
	 * @return	null
	 */
	function destroy() {}
}
