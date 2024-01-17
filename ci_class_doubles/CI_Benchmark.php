<?php
/**
 * Description of CI_Benchmark
 *
 * @author kevin
 */
class CI_Benchmark
{
    /**
     * Set a benchmark marker
     *
     * Multiple calls to this function can be made so that several
     * execution points can be timed
     *
     * @access      public
     * @param       string  $name   name of the marker
     * @return      void
     */
    function mark($name) {}

    /**
     * Calculates the time difference between two marked points.
     *
     * If the first parameter is empty this function instead returns the
     * {elapsed_time} pseudo-variable. This permits the full system
     * execution time to be shown in a template. The output class will
     * swap the real value for this variable.
     *
     * @access      public
     * @param       string  a particular marked point
     * @param       string  a particular marked point
     * @param       integer the number of decimal places
     * @return      mixed
     */
    function elapsed_time($point1 = '', $point2 = '', $decimals = 4) {}

    /**
    * Memory Usage
    *
    * This function returns the {memory_usage} pseudo-variable.
    * This permits it to be put it anywhere in a template
    * without the memory being calculated until the end.
    * The output class will swap the real value for this variable.
    *
    * @access      public
    * @return      string
    */
   function memory_usage() {}

}
