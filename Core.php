<?php
const DYNAMIC_DATES_VERSION = '2.0.2';
require_once 'Converter.php';
if (! class_exists ( "DynamicDatesLogger" )) {
	
	//
	class DynamicDatesLogger {
		const ALL_INT = - 2147483648;
		const DEBUG_INT = 10000;
		const ERROR_INT = 40000;
		const FATAL_INT = 50000;
		const INFO_INT = 20000;
		const OFF_INT = 2147483647;
		const WARN_INT = 30000;
		private $name;
		private $logLevel;
		function __construct($name) {
			$this->name = $name;
			$this->logLevel = DynamicDatesOptions::getInstance()->getOptions()['log_level'];
		}
		// better logging thanks to http://www.smashingmagazine.com/2011/03/08/ten-things-every-wordpress-plugin-developer-should-know/
		function debug($text) {
			if (WP_DEBUG === true && self::DEBUG_INT >= $this->logLevel) {
				if (is_array ( $text ) || is_object ( $text )) {
					error_log ( 'DEBUG ' . $this->name . ': ' . print_r ( $text, true ) );
				} else {
					error_log ( 'DEBUG ' . $this->name . ': ' . $text );
				}
			}
		}
		function error($text) {
			if (WP_DEBUG === true && self::ERROR_INT >= $this->logLevel) {
				if (is_array ( $text ) || is_object ( $text )) {
					error_log ( 'ERROR' . $this->name . ': ' . print_r ( $text, true ) );
				} else {
					error_log ( 'ERROR ' . $this->name . ': ' . $text );
				}
			}
		}
	}
}
if (! class_exists ( 'DynamicDatesOptions' )) {
	class DynamicDatesOptions {
		private $options;
		private function __construct() {
			$this->options = get_option ( DynamicDatesAdminController::OPTION_NAME );
			if (! isset ( $this->options ['log_level'] )) {
				$this->options ['log_level'] = DynamicDatesLogger::ERROR_INT;
			}
			if (! isset ( $this->options ['mode'] )) {
				$this->options ['mode'] = 'english';
			}
		}
		// singleton instance
		public static function getInstance() {
			static $inst = null;
			if ($inst === null) {
				$inst = new DynamicDatesOptions ();
			}
			return $inst;
		}
		public function getOptions() {
			return $this->options;
		}
	}
}
?>