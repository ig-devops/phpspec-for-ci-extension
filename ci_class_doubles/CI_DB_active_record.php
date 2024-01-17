<?php

/**
 * Fake DB active record class
 *
 * NOTE: originally extends the CI_DB_driver class
 */
class CI_DB_active_record extends CI_DB_driver
{

    /**
     * Select
     *
     * Generates the SELECT portion of the query
     *
     * @param	string
     * @return	object
     */
    public function select($select = '*', $escape = NULL) {}

    /**
     * Select Max
     *
     * Generates a SELECT MAX(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	object
     */
    public function select_max($select = '', $alias = '') {}

    /**
     * Select Min
     *
     * Generates a SELECT MIN(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	object
     */
    public function select_min($select = '', $alias = '') {}

    /**
     * Select Average
     *
     * Generates a SELECT AVG(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	object
     */
    public function select_avg($select = '', $alias = '') {}

    /**
     * Select Sum
     *
     * Generates a SELECT SUM(field) portion of a query
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	object
     */
    public function select_sum($select = '', $alias = '') {}

    /**
     * Processing Function for the four functions above:
     *
     *	select_max()
     *	select_min()
     *	select_avg()
     *  select_sum()
     *
     * @param	string	the field
     * @param	string	an alias
     * @return	object
     */
    protected function _max_min_avg_sum($select = '', $alias = '', $type = 'MAX') {}

    /**
     * Determines the alias name based on the table
     *
     * @param	string
     * @return	string
     */
    protected function _create_alias_from_table($item) {}

    /**
     * DISTINCT
     *
     * Sets a flag which tells the query string compiler to add DISTINCT
     *
     * @param	bool
     * @return	object
     */
    public function distinct($val = TRUE) {}

    /**
     * From
     *
     * Generates the FROM portion of the query
     *
     * @param	mixed	can be a string or array
     * @return	object
     */
    public function from($from) {}

    /**
     * Join
     *
     * Generates the JOIN portion of the query
     *
     * @param	string
     * @param	string	the join condition
     * @param	string	the type of join
     * @return	object
     */
    public function join($table, $cond, $type = '') {}

    /**
     * Where
     *
     * Generates the WHERE portion of the query. Separates
     * multiple calls with AND
     *
     * @param	mixed
     * @param	mixed
     * @return	object
     */
    public function where($key, $value = NULL, $escape = TRUE) {}

    /**
     * OR Where
     *
     * Generates the WHERE portion of the query. Separates
     * multiple calls with OR
     *
     * @param	mixed
     * @param	mixed
     * @return	object
     */
    public function or_where($key, $value = NULL, $escape = TRUE) {}

    /**
     * Where
     *
     * Called by where() or or_where()
     *
     * @param	mixed
     * @param	mixed
     * @param	string
     * @return	object
     */
    protected function _where($key, $value = NULL, $type = 'AND ', $escape = NULL) {}

    /**
     * Where_in
     *
     * Generates a WHERE field IN ('item', 'item') SQL query joined with
     * AND if appropriate
     *
     * @param	string	The field to search
     * @param	array	The values searched on
     * @return	object
     */
    public function where_in($key = NULL, $values = NULL) {}

    /**
     * Where_in_or
     *
     * Generates a WHERE field IN ('item', 'item') SQL query joined with
     * OR if appropriate
     *
     * @param	string	The field to search
     * @param	array	The values searched on
     * @return	object
     */
    public function or_where_in($key = NULL, $values = NULL) {}

    /**
     * Where_not_in
     *
     * Generates a WHERE field NOT IN ('item', 'item') SQL query joined
     * with AND if appropriate
     *
     * @param	string	The field to search
     * @param	array	The values searched on
     * @return	object
     */
    public function where_not_in($key = NULL, $values = NULL) {}

    /**
     * Where_not_in_or
     *
     * Generates a WHERE field NOT IN ('item', 'item') SQL query joined
     * with OR if appropriate
     *
     * @param	string	The field to search
     * @param	array	The values searched on
     * @return	object
     */
    public function or_where_not_in($key = NULL, $values = NULL)
    {
        return $this->_where_in($key, $values, TRUE, 'OR ');
    }

    // --------------------------------------------------------------------

    /**
     * Where_in
     *
     * Called by where_in, where_in_or, where_not_in, where_not_in_or
     *
     * @param	string	The field to search
     * @param	array	The values searched on
     * @param	boolean	If the statement would be IN or NOT IN
     * @param	string
     * @return	object
     */
    protected function _where_in($key = NULL, $values = NULL, $not = FALSE, $type = 'AND ') {}

    // --------------------------------------------------------------------

    /**
     * Like
     *
     * Generates a %LIKE% portion of the query. Separates
     * multiple calls with AND
     *
     * @param	mixed
     * @param	mixed
     * @return	object
     */
    public function like($field, $match = '', $side = 'both') {}

    // --------------------------------------------------------------------

    /**
     * Not Like
     *
     * Generates a NOT LIKE portion of the query. Separates
     * multiple calls with AND
     *
     * @param	mixed
     * @param	mixed
     * @return	object
     */
    public function not_like($field, $match = '', $side = 'both') {}

    /**
     * OR Like
     *
     * Generates a %LIKE% portion of the query. Separates
     * multiple calls with OR
     *
     * @param	mixed
     * @param	mixed
     * @return	object
     */
    public function or_like($field, $match = '', $side = 'both') {}

    /**
     * OR Not Like
     *
     * Generates a NOT LIKE portion of the query. Separates
     * multiple calls with OR
     *
     * @param	mixed
     * @param	mixed
     * @return	object
     */
    public function or_not_like($field, $match = '', $side = 'both') {}

    /**
     * Like
     *
     * Called by like() or orlike()
     *
     * @param	mixed
     * @param	mixed
     * @param	string
     * @return	object
     */
    protected function _like($field, $match = '', $type = 'AND ', $side = 'both', $not = '') {}

    /**
     * GROUP BY
     *
     * @param	string
     * @return	object
     */
    public function group_by($by) {}
    /**
     * Sets the HAVING value
     *
     * Separates multiple calls with AND
     *
     * @param	string
     * @param	string
     * @return	object
     */
    public function having($key, $value = '', $escape = TRUE) {}

    /**
     * Sets the OR HAVING value
     *
     * Separates multiple calls with OR
     *
     * @param	string
     * @param	string
     * @return	object
     */
    public function or_having($key, $value = '', $escape = TRUE) {}

    /**
     * Sets the HAVING values
     *
     * Called by having() or or_having()
     *
     * @param	string
     * @param	string
     * @return	object
     */
    protected function _having($key, $value = '', $type = 'AND ', $escape = TRUE) {}

    /**
     * Sets the ORDER BY value
     *
     * @param	string
     * @param	string	direction: asc or desc
     * @return	object
     */
    public function order_by($orderby, $direction = '') {}

    /**
     * Sets the LIMIT value
     *
     * @param	integer	the limit value
     * @param	integer	the offset value
     * @return	object
     */
    public function limit($value, $offset = '') {}

    /**
     * Sets the OFFSET value
     *
     * @param	integer	the offset value
     * @return	object
     */
    public function offset($offset) {}

    /**
     * The "set" function.  Allows key/value pairs to be set for inserting or updating
     *
     * @param	mixed
     * @param	string
     * @param	boolean
     * @return	object
     */
    public function set($key, $value = '', $escape = TRUE) {}

    /**
     * Get
     *
     * Compiles the select statement based on the other functions called
     * and runs the query
     *
     * @param	string	the table
     * @param	string	the limit clause
     * @param	string	the offset clause
     * @return	object
     */
    public function get($table = '', $limit = null, $offset = null) {}

    /**
     * "Count All Results" query
     *
     * Generates a platform-specific query string that counts all records
     * returned by an Active Record query.
     *
     * @param	string
     * @return	string
     */
    public function count_all_results($table = '') {}

    /**
     * Get_Where
     *
     * Allows the where clause, limit and offset to be added directly
     *
     * @param	string	the where clause
     * @param	string	the limit clause
     * @param	string	the offset clause
     * @return	object
     */
    public function get_where($table = '', $where = null, $limit = null, $offset = null) {}

    /**
     * Insert_Batch
     *
     * Compiles batch insert strings and runs the queries
     *
     * @param	string	the table to retrieve the results from
     * @param	array	an associative array of insert values
     * @return	object
     */
    public function insert_batch($table = '', $set = NULL) {}

    /**
     * The "set_insert_batch" function.  Allows key/value pairs to be set for batch inserts
     *
     * @param	mixed
     * @param	string
     * @param	boolean
     * @return	object
     */
    public function set_insert_batch($key, $value = '', $escape = TRUE) {}

    /**
     * Insert
     *
     * Compiles an insert string and runs the query
     *
     * @param	string	the table to insert data into
     * @param	array	an associative array of insert values
     * @return	object
     */
    function insert($table = '', $set = NULL) {}

    /**
     * Replace
     *
     * Compiles an replace into string and runs the query
     *
     * @param	string	the table to replace data into
     * @param	array	an associative array of insert values
     * @return	object
     */
    public function replace($table = '', $set = NULL) {}

    /**
     * Update
     *
     * Compiles an update string and runs the query
     *
     * @param	string	the table to retrieve the results from
     * @param	array	an associative array of update values
     * @param	mixed	the where clause
     * @return	object
     */
    public function update($table = '', $set = NULL, $where = NULL, $limit = NULL) {}

    /**
     * Update_Batch
     *
     * Compiles an update string and runs the query
     *
     * @param	string	the table to retrieve the results from
     * @param	array	an associative array of update values
     * @param	string	the where key
     * @return	object
     */
    public function update_batch($table = '', $set = NULL, $index = NULL) {}

    /**
     * The "set_update_batch" function.  Allows key/value pairs to be set for batch updating
     *
     * @param	array
     * @param	string
     * @param	boolean
     * @return	object
     */
    public function set_update_batch($key, $index = '', $escape = TRUE) {}

    /**
     * Empty Table
     *
     * Compiles a delete string and runs "DELETE FROM table"
     *
     * @param	string	the table to empty
     * @return	object
     */
    public function empty_table($table = '') {}

    /**
     * Truncate
     *
     * Compiles a truncate string and runs the query
     * If the database does not support the truncate() command
     * This function maps to "DELETE FROM table"
     *
     * @param	string	the table to truncate
     * @return	object
     */
    public function truncate($table = '') {}

    /**
     * Delete
     *
     * Compiles a delete string and runs the query
     *
     * @param	mixed	the table(s) to delete from. String or array
     * @param	mixed	the where clause
     * @param	mixed	the limit clause
     * @param	boolean
     * @return	object
     */
    public function delete($table = '', $where = '', $limit = NULL, $reset_data = TRUE) {}

    /**
     * DB Prefix
     *
     * Prepends a database prefix if one exists in configuration
     *
     * @param	string	the table
     * @return	string
     */
    public function dbprefix($table = '') {}

    /**
     * Set DB Prefix
     *
     * Set's the DB Prefix to something new without needing to reconnect
     *
     * @param	string	the prefix
     * @return	string
     */
    public function set_dbprefix($prefix = '') {}

    /**
     * Track Aliases
     *
     * Used to track SQL statements written with aliased tables.
     *
     * @param	string	The table to inspect
     * @return	string
     */
    protected function _track_aliases($table) {}

    /**
     * Compile the SELECT statement
     *
     * Generates a query string based on which functions were used.
     * Should not be called directly.  The get() function calls it.
     *
     * @return	string
     */
    protected function _compile_select($select_override = FALSE) {}

    /**
     * Object to Array
     *
     * Takes an object as input and converts the class variables to array key/vals
     *
     * @param	object
     * @return	array
     */
    public function _object_to_array($object) {}

    /**
     * Object to Array
     *
     * Takes an object as input and converts the class variables to array key/vals
     *
     * @param	object
     * @return	array
     */
    public function _object_to_array_batch($object) {}

    /**
     * Start Cache
     *
     * Starts AR caching
     *
     * @return	void
     */
    public function start_cache() {}

    /**
     * Stop Cache
     *
     * Stops AR caching
     *
     * @return	void
     */
    public function stop_cache() {}

    /**
     * Flush Cache
     *
     * Empties the AR cache
     *
     * @access	public
     * @return	void
     */
    public function flush_cache() {}
}