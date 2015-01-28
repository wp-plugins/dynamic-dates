<?php
const DYNAMIC_DATES_VERSION = '2.0.2';
require_once 'Converter.php';
if (! function_exists ( 'debugDD' )) {
	function debugDD($text) {
		error_log ( "DynamicDates: " . $text );
	}
}
?>