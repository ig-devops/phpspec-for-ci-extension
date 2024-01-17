<?php

/**
 * Fake XML-RPC request handler class
 */
class CI_Xmlrpc
{
	function initialize($config = array()) {}

	function server($url, $port=80) {}

	function timeout($seconds=5) {}

	function method($function) {}

	function request($incoming) {}

	function set_debug($flag = TRUE) {}

	function values_parsing($value, $return = FALSE) {}

	function send_request() {}

	function display_error() {}

	function display_response() {}

	function send_error_message($number, $message) {}

	function send_response($response) {}
}

/**
 * Fake XML-RPC Client class
 */
class XML_RPC_Client extends CI_Xmlrpc
{

	function send($msg) {}

	function sendPayload($msg) {}
}

/**
 * Fake XML-RPC Response class
 */
class XML_RPC_Response
{
	function faultCode() {}

	function faultString() {}

	function value() {}

	function prepare_response() {}

	function decode($array=FALSE) {}

	function xmlrpc_decoder($xmlrpc_val) {}

	function iso8601_decode($time, $utc=0) {}
}

/**
 * Fake XML-RPC Message class
 */
class XML_RPC_Message extends CI_Xmlrpc
{
	function createPayload() {}

	function parseResponse($fp) {}

	function open_tag($the_parser, $name, $attrs) {}

	function closing_tag($the_parser, $name) {}

	function character_data($the_parser, $data) {}

	function addParam($par) {}

	function output_parameters($array=FALSE) {}

	function decode_message($param) {}
}

/**
 * Fake XML-RPC Values class
 */
class XML_RPC_Values extends CI_Xmlrpc
{
	function addScalar($val, $type='string') {}

	function addArray($vals) {}

	function addStruct($vals) {}

	function kindOf() {}

	function serializedata($typ, $val) {}

	function serialize_class() {}

	function serializeval($o) {}

	function scalarval() {}

	function iso8601_encode($time, $utc=0) {}
}
