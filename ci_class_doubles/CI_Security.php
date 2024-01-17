<?php
/**
 * Description of CI_Security
 *
 * @author kevin
 */
class CI_Security
{
    /**
     * Verify Cross Site Request Forgery Protection
     *
     * @return      object
     */
    public function csrf_verify() {}

    /**
     * Set Cross Site Request Forgery Protection Cookie
     *
     * @return      object
     */
    public function csrf_set_cookie() {}

    /**
     * Show CSRF Error
     *
     * @return      void
     */
    public function csrf_show_error() {}

    /**
     * Get CSRF Hash
     *
     * Getter Method
     *
     * @return      string  self::_csrf_hash
     */
    public function get_csrf_hash() {}

    /**
     * Get CSRF Token Name
     *
     * Getter Method
     *
     * @return      string  self::csrf_token_name
     */
    public function get_csrf_token_name() {}

    /**
     * XSS Clean
     *
     * Sanitizes data so that Cross Site Scripting Hacks can be
     * prevented.  This function does a fair amount of work but
     * it is extremely thorough, designed to prevent even the
     * most obscure XSS attempts.  Nothing is ever 100% foolproof,
     * of course, but I haven't been able to get anything passed
     * the filter.
     *
     * Note: This function should only be used to deal with data
     * upon submission.  It's not something that should
     * be used for general runtime processing.
     *
     * This function was based in part on some code and ideas I
     * got from Bitflux: http://channel.bitflux.ch/wiki/XSS_Prevention
     *
     * To help develop this script I used this great list of
     * vulnerabilities along with a few other hacks I've
     * harvested from examining vulnerabilities in other programs:
     * http://ha.ckers.org/xss.html
     *
     * @param       mixed   string or array
     * @param       bool
     * @return      string
     */
    public function xss_clean($str, $is_image = FALSE) {}

    /**
     * Random Hash for protecting URLs
     *
     * @return      string
     */
    public function xss_hash() {}

    /**
     * HTML Entities Decode
     *
     * This function is a replacement for html_entity_decode()
     *
     * The reason we are not using html_entity_decode() by itself is because
     * while it is not technically correct to leave out the semicolon
     * at the end of an entity most browsers will still interpret the entity
     * correctly.  html_entity_decode() does not convert entities without
     * semicolons, so we are left with our own little solution here. Bummer.
     *
     * @param       string
     * @param       string
     * @return      string
     */
    public function entity_decode($str, $charset='UTF-8') {}



    /**
     * Filename Security
     *
     * @param       string
     * @param       bool
     * @return      string
     */
    public function sanitize_filename($str, $relative_path = FALSE) {}

}
